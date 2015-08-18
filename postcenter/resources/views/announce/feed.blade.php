
<!-- START EMAILS LIST -->
<div class="email-list b-r b-grey"> <a class="email-refresh" href="#"><i class="fa fa-refresh"></i></a>
  <div id="emailList" class="list-view"><h2 class="list-view-fake-header"><i class="fa fa-facebook-official"></i> POST</h2>
    <!-- START EMAIL LIST SORTED BY DATE -->
    <!-- END EMAIL LIST SORTED BY DATE -->
  <div class="list-view-wrapper" data-ios="false">
    <div class="list-view-group-container" style="padding:45px 15px 0 15px">
              <div class="card share  col1" data-social="item" style="width:100%;" ng-repeat="post in postList">
                        <div ng-class="{'fa fa-facebook':post.post_channel == 'facebook'}" data-toggle="tooltip" title="Label" data-container="body">
                        </div>
                        <div class="card-header clearfix">
                            <div class="user-pic">
                                <img alt="Profile Image" width="33" height="33" ui-jq="unveil" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8.jpg">
                            </div>
                            <h5>@{{ post.author_name }}</h5>
                            <h6>Posted Time
                                <span class="location semi-bold">@{{ post.posted_time }}</span>
                            </h6>
                        </div>
                        <div class="card-description">
                            <p>@{{ post.post_body }} </p>
                            <div class="via">via @{{ post.post_channel }}</div>
                        </div>
                        <div class="card-content" ng-if="post.post_image_url">
                            <img alt="Social post" src="@{{ post.post_image_url }}">
                        </div>
                        <div class="card-footer clearfix">
                            <div class="time">@{{ post.posted_time }}</div>
                            <ul class="reactions">
                                <li><a href="">@{{ post.post_comment_count }} <i class="fa fa-comment-o"></i></a>
                                </li>
                                <li><a href="">@{{ post.post_likes_count }} <i class="fa fa-like-o"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
        </div>
    </div>
  </div>
  
  
