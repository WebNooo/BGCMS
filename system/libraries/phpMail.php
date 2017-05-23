<?php

namespace system;

class phpMail
{
    static protected $_wrap = 78;

    static protected $_to = array();

    static protected $_subject;

    static protected $_message;

    static protected $_headers = array();

    static protected $_params;

    static protected $_attachments = array();

    static protected $_uid;

    public static function reset()
    {
        self::$_to = array();
        self::$_headers = array();
        self::$_subject = null;
        self::$_message = null;
        self::$_wrap = 78;
        self::$_params = null;
        self::$_attachments = array();
        self::$_uid = self::getUniqueId();
        return 0;
    }

    public static function setTo($email, $name)
    {
        return self::$_to[] = self::formatHeader((string)$email, (string)$name);
    }

    public static function getTo()
    {
        return self::$_to;
    }

    public static function setSubject($subject)
    {
        self::$_subject = self::encodeUtf8(
            self::filterOther((string)$subject)
        );
        return self::$_subject;
    }

    public static function getSubject()
    {
        return self::$_subject;
    }

    public static function setMessage($message)
    {
        self::$_message = str_replace("\n.", "\n..", (string)$message);
        return self::$_message;
    }

    public static function getMessage()
    {
        return self::$_message;
    }

    public static function addAttachment($path, $filename = null)
    {
        $filename = empty($filename) ? basename($path) : $filename;
        self::$_attachments[] = array(
            'path' => $path,
            'file' => $filename,
            'data' => self::getAttachmentData($path)
        );
        return self::$_attachments;
    }

    public static function getAttachmentData($path)
    {
        $filesize = filesize($path);
        $handle = fopen($path, "r");
        $attachment = fread($handle, $filesize);
        fclose($handle);
        return chunk_split(base64_encode($attachment));
    }

    public static function setFrom($email, $name)
    {
        return self::addMailHeader('From', (string)$email, (string)$name);
    }

    public static function addMailHeader($header, $email = null, $name = null)
    {
        $address = self::formatHeader((string)$email, (string)$name);
        self::$_headers[] = sprintf('%s: %s', (string)$header, $address);
        return self::$_headers;
    }

    public static function addGenericHeader($header, $value)
    {
        self::$_headers[] = sprintf(
            '%s: %s',
            (string)$header,
            (string)$value
        );
        return self::$_headers;
    }

    public static function getHeaders()
    {
        return self::$_headers;
    }

    public static function setParameters($additionalParameters)
    {
        return self::$_params = (string)$additionalParameters;

    }

    public static function getParameters()
    {
        return self::$_params;
    }

    public static function setWrap($wrap = 78)
    {
        $wrap = (int)$wrap;
        if ($wrap < 1) {
            $wrap = 78;
        }
        return self::$_wrap = $wrap;

    }

    public static function getWrap()
    {
        return self::$_wrap;
    }

    public static function hasAttachments()
    {
        return !empty(self::$_attachments);
    }

    public static function assembleAttachmentHeaders()
    {
        $head = array();
        $head[] = "MIME-Version: 1.0";
        $head[] = "Content-Type: multipart/mixed; boundary=\"{self::_uid}\"";
        return join(PHP_EOL, $head);
    }

    public static function assembleAttachmentBody()
    {
        $body = array();
        $body[] = "This is a multi-part message in MIME format.";
        $body[] = "--{self::_uid}";
        $body[] = "Content-type:text/html; charset=\"utf-8\"";
        $body[] = "Content-Transfer-Encoding: 7bit";
        $body[] = "";
        $body[] = self::$_message;
        $body[] = "";
        $body[] = "--{self::_uid}";
        foreach (self::$_attachments as $attachment) {
            $body[] = self::getAttachmentMimeTemplate($attachment);
        }
        return implode(PHP_EOL, $body);
    }

    public static function getAttachmentMimeTemplate($attachment)
    {
        $file = $attachment['file'];
        $data = $attachment['data'];
        $head = array();
        $head[] = "Content-Type: application/octet-stream; name=\"{$file}\"";
        $head[] = "Content-Transfer-Encoding: base64";
        $head[] = "Content-Disposition: attachment; filename=\"{$file}\"";
        $head[] = "";
        $head[] = $data;
        $head[] = "";
        $head[] = "--{self::_uid}";
        return implode(PHP_EOL, $head);
    }

    public static function send()
    {
        $to = self::getToForSend();
        $headers = self::getHeadersForSend();
        if (empty($to)) {
            throw new \RuntimeException(
                'Unable to send, no To address has been set.'
            );
        }
        if (self::hasAttachments()) {
            $message = self::assembleAttachmentBody();
            $headers .= PHP_EOL . self::assembleAttachmentHeaders();
        } else {
            $message = self::getWrapMessage();
        }
        return mail($to, self::$_subject, $message, $headers, self::$_params);
    }

    public static function formatHeader($email, $name = null)
    {
        $email = self::filterEmail($email);
        if (empty($name)) {
            return $email;
        }
        $name = self::encodeUtf8(self::filterName($name));
        return sprintf('"%s" <%s>', $name, $email);
    }

    public static function encodeUtf8($value)
    {
        $value = trim($value);
        if (preg_match('/(\s)/', $value)) {
            return self::encodeUtf8Words($value);
        }
        return self::encodeUtf8Word($value);
    }

    public static function encodeUtf8Word($value)
    {
        return sprintf('=?UTF-8?B?%s?=', base64_encode($value));
    }

    public static function encodeUtf8Words($value)
    {
        $words = explode(' ', $value);
        $encoded = array();
        foreach ($words as $word) {
            $encoded[] = self::encodeUtf8Word($word);
        }
        return join(self::encodeUtf8Word(' '), $encoded);
    }

    public static function filterEmail($email)
    {
        $rule = array(
            "\r" => '',
            "\n" => '',
            "\t" => '',
            '"' => '',
            ',' => '',
            '<' => '',
            '>' => ''
        );
        $email = strtr($email, $rule);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }

    public static function filterName($name)
    {
        $rule = array(
            "\r" => '',
            "\n" => '',
            "\t" => '',
            '"' => "'",
            '<' => '[',
            '>' => ']',
        );
        $filtered = filter_var(
            $name,
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_NO_ENCODE_QUOTES
        );
        return trim(strtr($filtered, $rule));
    }

    public static function filterOther($data)
    {
        return filter_var($data, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
    }

    public static function getHeadersForSend()
    {
        if (empty(self::$_headers)) {
            return '';
        }
        return join(PHP_EOL, self::$_headers);
    }

    public static function getToForSend()
    {
        if (empty(self::$_to)) {
            return '';
        }
        return join(', ', self::$_to);
    }

    public static function getUniqueId()
    {
        return md5(uniqid(time()));
    }

    public static function getWrapMessage()
    {
        return wordwrap(self::$_message, self::$_wrap);
    }
}