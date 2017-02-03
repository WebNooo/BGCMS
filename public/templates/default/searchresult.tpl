<article class="short-story">
    <div class="article-img"><img src="{image-1}" alt="Постер к новости {title}"></div>
      <div class="short-left">
        <h2>[full-link]{title}[/full-link]</h2>
        <p>{short-story limit="800"}</p>
      </div>
      <div class="short-panel">
        <ul class="news-info">
          <li><i class="fa fa-user"></i>Автор: {author}</li>
          <li><i class="fa fa-comment"></i>Комментарии: {comments-num}</li>
          <li><i class="fa fa-eye"></i>Просмотры: {views}</li>
        </ul>
        <div class="right-panel">
        <a class="news-like"><i class="fa fa-thumbs-o-up"></i>{include file="engine/modules/easylike/easylike.php?news_id={news-id}"}</a>
        <a href="{full-link}" class="go-read" rel="nofollow">Читать далее<i class="fa fa-arrow-circle-o-right"></i></a>
        </div>
      </div>
    </article>