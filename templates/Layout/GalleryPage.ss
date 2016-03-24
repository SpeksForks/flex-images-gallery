<div class="page-content container">
  <div class="row">
    <div class="col-sm-12 full-width-container">
      $Breadcrumbs
      <h1 class="pageTitle">$Title</h1>
      <div class="gallery">
        <% loop $Images %>
        <a class="item" data-w="$me.Width" data-h="$me.Height" href="$me.URL" data-lightbox="GalleryLB" data-title="$me.Caption">
            <img src="$me.URL" alt="$me.Title">
        </a>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>