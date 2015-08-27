
<!-- START EMAILS LIST -->
<div class="email-list b-r b-grey" id="postlist" hidden> <a class="email-refresh" href="#"><i class="fa fa-refresh"></i></a>
  <div id="emailList" class="list-view"><h2 class="list-view-fake-header"><i class="fa fa-facebook-official"></i> POST</h2>
    <!-- START EMAIL LIST SORTED BY DATE -->
    <!-- END EMAIL LIST SORTED BY DATE -->
  <div class="list-view-wrapper" data-ios="false" style="background-color:#EEF0F0;">
   <div infinite-scroll='reddit.nextPage()' infinite-scroll-distance='2' infinite-scroll-disabled='riddit.busy' infinite-scroll-container='".scroll-element.scroll-y"'>
    <div class="list-view-group-container" style="padding:45px 15px 0 15px;">
        <div class="list-view-group-header">
            <span><i class="fa fa-facebook-official"></i> POST</span>
            </div>
        <div class="card share col1" data-social="item" style="width:100%;" ng-repeat="(key, post) in reddit.postList" ng-click="showThread(post.post_social_id, key)" ng-class="postactive[key]">
                <div ng-class="{'fa fa-facebook':post.post_channel == 'facebook'}" data-toggle="tooltip" title="Label" data-container="body">
                </div>
                <div class="card-header clearfix">
                    <div class="user-pic">
                        <img alt="Profile Image" width="33" height="33" ui-jq="unveil" data-src-retina="@{{ post.author_image_url }}" data-src="@{{ post.author_image_url }}" src="@{{ post.author_image_url }}">
                    </div>
                    <h5>@{{ post.author_name }}</h5>
                    <h6>Posted Time
                        <span class="location semi-bold">@{{ post.posted_time }}</span>
                    </h6>
                </div>
                <div ng-if="post.post_body" class="card-description">
                    <p>@{{ post.post_body }} </p>
                </div>
                <div class="card-content" ng-if="post.post_image_url">
                    <img alt="Social post" src="@{{ post.post_image_url }}">
                </div>
                <div class="card-footer clearfix">
                    <div class="time">@{{ post.posted_time }}</div>
                    <ul class="reactions">
                        <li><a href="">@{{ post.post_comment_count }} <i class="fa fa-comment-o"></i></a>
                        </li>
                        <li><a href="">@{{ post.post_likes_count }} <i class="fa fa-thumbs-o-up"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div ng-show='!reddit.busy' ng-click="reddit.nextPage()" class="text-center">
                <button class="btn btn-default btn-sm  btn-rounded m-r-20"><i class="fa fa-chevron-down"></i> Load More</button>
            </div>
            <div ng-show='reddit.busy'>
                <div class="text-center">
                    <div class="progress-circle-indeterminate m-t-45">
                    </div>
                    <br>
                    <p class="small hint-text">Loading...</p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
  
