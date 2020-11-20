<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{block:PostSummary}{PostSummary} &mdash; {/block:PostSummary}{Title}</title>
{block:Description}<meta name="description" content="{MetaDescription}">{/block:Description}

{block:IfDummy} <!-- Keeps options from appearing in the actual source. -->
<meta name="color:Background color" content="#F6F6F6">
<meta name="color:Text color" content="#202020">
<meta name="color:Title color for header image" content="#FFFFFF">
<meta name="color:Link color" content="#0050C0">
<meta name="color:Photo background" content="#000000">
<meta name="color:Base quote color" content="#C03000">
<meta name="color:Alternate quote color" content="#404040">
<meta name="select:Text size" content="text-normal"   title="Normal">
<meta name="select:Text size" content="text-smaller"  title="Smaller">
<meta name="select:Text size" content="text-smallest" title="Smallest">
<meta name="select:Text size" content="text-bigger"   title="Bigger">
<meta name="select:Text size" content="text-biggest"  title="Biggest">
<meta name="select:Column width" content="col-normal" title="Normal">
<meta name="select:Column width" content="col-narrow" title="Narrow">
<meta name="select:Column width" content="col-wide"   title="Wide">
<meta name="select:Link back home" content="homelink-avatar" title="Avatar">
<meta name="select:Link back home" content="homelink-avatarsmall" title="Small avatar">
<meta name="select:Link back home" content="homelink-title" title="Blog title">
<meta name="select:Link style" content="link-brackets"  title="Brackets">
<meta name="select:Link style" content="link-underline" title="Underline">
<meta name="select:Link style" content="link-brackets link-underline" title="Brackets + Underline">
<meta name="select:Link style" content="link-none" title="None">
<meta name="if:Add collapse buttons to quotes" content="1">
<meta name="if:Custom photoset layout" content="1">
<meta name="if:Fullres photo posts" content="0">
<meta name="if:Show archive link" content="0">
<meta name="if:Navigation at the bottom" content="0">
<meta name="if:Hide notes link" content="0">
<meta name="text:Separator text" content="* * * *">
<meta name="text:Additional links" content="&lt;!-- <a href=&quot;/tagged/special-tag&quot;&gt;Some special tag&lt;/a&gt; --&gt;">
<meta name="text:Main font" content="Source Code Pro, Menlo, Monaco, Consolas, monospace">
<meta name="text:Blockquote font" content="Courier, Courier New, monospace">
{/block:IfDummy}

<link rel="icon" href="{Favicon}">
<link rel="alternate" type="application/rss+xml" href="{RSS}">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
<?php if ($css = file_get_contents(__DIR__ . "/cache/theme.css")) echo $css; ?>
{CustomCSS}
</style>
</head>

<body remarkdown class="{select:Text size} {select:Column width} {select:Link style} {select:Link back home}
  {block:IndexPage}isIndexPage{/block:IndexPage}{block:PermalinkPage}isPermalinkPage{/block:PermalinkPage}">

<header id="sitebanner"
class="{block:ShowAvatar}hasAvatar{/block:ShowAvatar}{block:IfSmallAvatarPlease} smallAvatar{/block:IfSmallAvatarPlease}
  {block:ShowHeaderImage}hasHeaderImage{/block:ShowHeaderImage}
  {block:ShowTitle}hasTitle{/block:ShowTitle}
  {block:ShowDescription}hasDescription{/block:ShowDescription}">

{block:IndexPage}
<a href="{BlogURL}" class="main">
{block:ShowAvatar}
  <img class="avatar {AvatarShape}" alt="{block:HideTitle}{Title}{/block:HideTitle}" src="{PortraitURL-128}">
{/block:ShowAvatar}
{block:ShowTitle}
  <h1><span>{Title}</span></h1>
{/block:ShowTitle}
</a>
{/block:IndexPage}

{block:PermalinkPage}
  <a href="{BlogURL}" class="home">
    {block:ShowAvatar}<img class="avatar {AvatarShape}" alt="{Title}" title="{Title}" src="{PortraitURL-128}">{/block:ShowAvatar}
    <span class="title">&lt;&nbsp;{Title}</span>
  </a>
{/block:PermalinkPage}

{block:IndexPage}
{block:ShowDescription}
{block:Description}
  <p class="[]">{Description}</p>
{/block:Description}
{/block:ShowDescription}

{block:IfNotNavigationAtTheBottom}
<nav class="main-nav []">
{block:HasPages}
  {block:Pages}<a href="{URL}">{Label}</a> {/block:Pages}
{/block:HasPages}
  {text:Additional links}
{block:IfShowArchiveLink}
  <a href="/archive">{lang:Archive}</a>
{/block:IfShowArchiveLink}
{block:SubmissionsEnabled}
  <a href="/submit">{SubmitLabel}</a>
{/block:SubmissionsEnabled}
{block:AskEnabled}
  <a href="/ask">{AskLabel}</a>
{/block:AskEnabled}
</nav>
{/block:IfNotNavigationAtTheBottom}
{/block:IndexPage}

</header>

<div id="posts">

{block:NoSearchResults}
<h2>{lang:No results for SearchQuery}</h2>
{/block:NoSearchResults}

{block:TagPage}
<div id="tag-header">
<h2>{lang:Posts tagged Tag}</h2>
</div>
{/block:TagPage}

{block:Posts}

{block:IndexPage}<hr>{/block:IndexPage}

<article class="{PostType} {block:Photo}photo-post{/block:Photo}{block:Photoset}photo-set{/block:Photoset}
  {block:Panorama}photo-panorama{/block:Panorama}
  {block:RebloggedFrom}reblog{/block:RebloggedFrom}{block:NotReblog}original{/block:NotReblog}">

{block:Text}
{block:Title}
  {block:PermalinkPage}
  <div class="post-title">
    <h1>{Title}</h1>
  </div>
  {/block:PermalinkPage}
  {block:IndexPage}
  <div class="post-title">
    <h2><a href="{Permalink}">{Title}</a></h2>
  </div>
  {/block:IndexPage}
{/block:Title}
  <div class="maintext">
    {Body}
  </div>
{block:More}
  <p class="more"><a href="{Permalink}">{lang:Read more}&nbsp;-&gt;</a></p>
{/block:More}
{/block:Text}

{block:Photo}
{block:IfFullresPhotoPosts}
  <figure class="fullres">
    <picture>
      <source media="(min-width: 600px)" srcset="{PhotoURL-HighRes}">
      <img alt="{PhotoAlt}" src="{PhotoURL-500}">
    </picture>
  </figure>
{/block:IfFullresPhotoPosts}
{block:IfNotFullresPhotoPosts}
  <figure class="notfullres UseTumblrLightbox">
    {block:HighRes}<a href="{PhotoURL-HighRes}" data-lowres="{PhotoURL-500}" data-width="{PhotoWidth-HighRes}" data-height="{PhotoHeight-HighRes}">{/block:HighRes}<img alt="{PhotoAlt}" src="{PhotoURL-500}">{block:HighRes}</a>{/block:HighRes}
  </figure>
{/block:IfNotFullresPhotoPosts}
  <div class="maintext">
  {block:Caption}
    {Caption}
  {/block:Caption}
  </div>
{/block:Photo}

{block:Panorama}
{block:IfFullresPhotoPosts}
  <figure class="fullres">
  {LinkOpenTag}<img alt="{PhotoAlt}" src="{PhotoURL-1280}">{LinkCloseTag}
  </figure>
{/block:IfFullresPhotoPosts}
{block:IfNotFullresPhotoPosts}
  <figure class="notfullres">
  {LinkOpenTag}<img alt="{PhotoAlt}" src="{PhotoURL-500}">{LinkCloseTag}
  </figure>
{/block:IfNotFullresPhotoPosts}
  <div class="maintext">
  {block:Caption}
    {Caption}
  {/block:Caption}
  </div>
{/block:Panorama}

{block:Photoset}
{block:IfNotCustomPhotosetLayout}      
  <div class="photoset-default">
    {Photoset}
  </div>
{/block:IfNotCustomPhotosetLayout}
{block:IfCustomPhotosetLayout}
  <div class="photoset-custom UseTumblrLightbox" data-count="{PhotoCount}">
  {block:Photos}
    <a href="{PhotoURL-HighRes}" data-lowres="{PhotoURL-400}" data-width="{PhotoWidth-HighRes}" data-height="{PhotoHeight-HighRes}"><img alt="{PhotoAlt}" src="{PhotoURL-400}"></a>
  {/block:Photos}
  </div>
{/block:IfCustomPhotosetLayout}
  <div class="maintext">
  {block:Caption}
    {Caption}
  {/block:Caption}
  </div>
{/block:Photoset}

{block:Quote}
  <blockquote>
    <p>{Quote}</p>
  </blockquote>
{block:Source}
  <div class="maintext">
    &mdash; {Source}
  </div>
{/block:Source}
{/block:Quote}

{block:Link}
  <div class="post-title">
    <h2 class="link"><a href="{URL}" class="external">[-&gt;]&nbsp;{Name}</a></h2>
  </div>
{block:Description}
  <div class="maintext">
    {Description}
  </div>
{/block:Description}
{/block:Link}

{block:Answer}
  <div class="maintext">
    {block:Answerer}
    <p class="quote-meta">
      <b class="quote-author">{Answerer}:</b>
    </p>
    <blockquote>
    {/block:Answerer}
      <p class="quote-meta">
        <b class="quote-author">{Asker}:</b>
      </p>
      <blockquote>
        <p>{Question}</p>
      </blockquote>
      {Answer}
    {block:Answerer}
    </blockquote>
    {/block:Answerer}
  </div>
  {block:Answerer}
  <div class="replies">
    {Replies}
  </div>
  {/block:Answerer}
{/block:Answer}

{block:Chat}
{block:Title}
  {block:PermalinkPage}
  <div class="post-title">
    <h1>{Title}</h1>
  </div>
  {/block:PermalinkPage}
  {block:IndexPage}
  <div class="post-title">
    <h2>{Title}</h2>
  </div>
  {/block:IndexPage}
{/block:Title}
  <div class="maintext">
  {block:Lines}
    <p class="{Alt}">
    {block:Label}
      <b>{Label}</b>
    {/block:Label}
      {Line}
    </p>
  {/block:Lines}
  </div>
{/block:Chat}

{block:Audio}
  <figure class="maintext">
    {AudioEmbed-500}
  {block:Caption}
    <figcaption>
      {Caption}
    </figcaption>
  {/block:Caption}
  </figure>
{/block:Audio}

{block:Video}
  <figure class="maintext">
    {Video-700}
  {block:Caption}
    <figcaption class="maintext">
      {Caption}
    </figcaption>
  {/block:Caption}
  </figure>
{/block:Video}

<footer class="[]">
{block:Date}
  {block:PermalinkPage}
    <span class="date">{DayOfMonth} {ShortMonth} {Year}</span>
  {/block:PermalinkPage}
  {block:IndexPage}
    <a class="date" href="{Permalink}">{TimeAgo}</a>
  {/block:IndexPage}
{/block:Date}
{block:PermalinkPage}
  {block:IfNotHideNotesLink}
  {block:NoteCount}
  <a class="notes-link" href="{PostNotesURL}">{NoteCountWithLabel}</a>
  {/block:NoteCount}
  {/block:IfNotHideNotesLink}
{/block:PermalinkPage}
{block:Submission}
  <a href="{SubmitterURL}">^&nbsp;{Submitter}</a>
{/block:Submission}
{block:RebloggedFrom}
  <a class="reblog-root" href="{ReblogRootURL}">&gt;&nbsp;{ReblogRootName}</a>
{/block:RebloggedFrom}
{block:HasTags}
  {block:Tags}
  <a class="tag" href="{TagURL}">#{Tag}</a>
  {/block:Tags}
{/block:HasTags}
</footer>

{block:PermalinkPage}
  <div class="notes-container []"></div>
{/block:PermalinkPage}

</article>

{/block:Posts}

</div><!--#posts-->
        
{block:Pagination}
<hr>

<footer id="pagination" class="[]">
{block:PreviousPage}
  <a class="prev" href="{PreviousPage}">&lt;&lt;&nbsp;{lang:Previous}</a>
{/block:PreviousPage}
  <span class="page-numbers">Page&nbsp;{CurrentPage}&thinsp;/&thinsp;{TotalPages}</span>
{block:NextPage}
  <a class="next" href="{NextPage}">{lang:Next}&nbsp;&gt;&gt;</a>
{/block:NextPage}
</footer>
{/block:Pagination}

{block:IndexPage}
{block:IfNavigationAtTheBottom}
<hr>

<nav id="bottom-nav" class="main-nav []">
{block:HasPages}
  {block:Pages}<a href="{URL}">{Label}</a> {/block:Pages}
{/block:HasPages}
  {text:Additional Links}
{block:IfShowArchiveLink}
  <a href="/archive">{lang:Archive}</a>
{/block:IfShowArchiveLink}
{block:SubmissionsEnabled}
  <a href="/submit">{SubmitLabel}</a>
{/block:SubmissionsEnabled}
{block:AskEnabled}
  <a href="/ask">{AskLabel}</a>
{/block:AskEnabled}
</nav>
{/block:IfNavigationAtTheBottom}
{/block:IndexPage}

{block:IfFullresPhotoPosts}
<script>
// Expects <picture><source media="(media_query)" srcset="big"><img src="small"></picture>
void function stupid_picture_polyfill() {
  var pics = document.querySelectorAll('.fullres > picture > source + img');
  if (pics.length === 0) return;
  if ('currentSrc' in pics[0] || !'matchMedia' in window) return;
  for (var i=0; i < pics.length; i++) {
    var pic = pics[i], source = pic.previousElementSibling;
    var mq = source.getAttribute('media');
    var newsrc = source.getAttribute('srcset');
    if (newsrc && window.matchMedia(mq).matches) {
      pic.src = newsrc;
    }
  }
}();
</script>
{/block:IfFullresPhotoPosts}

{block:IfNotHideNotesLink}
<script>
void function xhr_tumblr_notes() {
  function addNotes(url, container) {
    var request = new XMLHttpRequest();
    request.onload = function(){
      var html = '<hr>\n' + this.responseText;
      container.insertAdjacentHTML('beforeend', html);
    }
    request.open('GET', url, true);
    request.send();
  }
  var link = document.querySelector('.notes-link');
  if (link) {
    var container = document.querySelector('.notes-container');
    link.addEventListener('click', function(event){
      event.preventDefault();
      addNotes(link.href, container);
      var span = document.createElement('span');
      span.className = 'notes-count';
      span.textContent = link.textContent;
      link.parentElement.replaceChild(span, link);
    });
  }
}();
</script>
{/block:IfNotHideNotesLink}

<script>
void function attach_tumblr_lightbox() {
  function viewportW() {
    var a = document.documentElement.clientWidth;
    var b = window.innerWidth;
    return a < b ? b : a;
  }
  function getImgInfo(link) {
    return {
      'width': link.getAttribute('data-width'),
      'height': link.getAttribute('data-height'),
      'low_res': link.getAttribute('data-lowres'),
      'high_res': link.href
    }
  }
  function callLightbox(event) {
    if (viewportW() < 600) {
      return;
    }
    var set = [], thisIndex = 1;
    var thisLink = event.currentTarget;
    var links = thisLink.parentElement.querySelectorAll('a');
    for (var i=0; i<links.length; i++) {
      if (links[i] === thisLink) {
        thisIndex = i + 1;
      }
      set.push(getImgInfo(links[i]));
    }
    if (Tumblr.Lightbox && set.length > 0) {
      event.preventDefault();
      Tumblr.Lightbox.init(set, thisIndex);
    }
  }
  // Init
  var imgLinks = document.querySelectorAll('.UseTumblrLightbox > a');
  for (var i=0, l=imgLinks.length; i<l; i++) {
    imgLinks[i].addEventListener('click', callLightbox);
  }
}();
</script>

{block:IfAddCollapseButtonsToQuotes}
<script>
void function toggle_those_blockquotes() {
  function makeBtn(para, quote) {
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'quote-toggle';
    btn.innerHTML = '<span>Toggle quote</span>';
    btn.addEventListener('click', function(event){
      var btn = event.currentTarget;
      btn.classList.toggle('hidden');
      quote.classList.toggle('hidden');
    });
    para.appendChild(btn);
  }
  function process(para, quote) {
    // mark short quotes
    if (quote.textContent.length < 80) {
      para.className += ' short';
    }
    // looking for the <p><a>someone</a>:</p> pattern.
    var link = para.querySelector('a:last-of-type');
    if (link !== null && /[a-z0-9-]+/.test(link.textContent.trim())) {
      var nxt = link.nextSibling;
      var end = para.lastChild;
      if (nxt !== end) return;
      if (end.textContent.trim() === ':') {
        para.className += ' quote-meta';
        link.className += ' quote-author';
        makeBtn(para, quote);
      }
    }
  }
  var quotes = document.querySelectorAll('.maintext p + blockquote');
  for (var i=0, l=quotes.length; i<l; i++) {
    process(quotes[i].previousElementSibling, quotes[i]);
  }
}();
</script>
{/block:IfAddCollapseButtonsToQuotes}

</body>
</html>
