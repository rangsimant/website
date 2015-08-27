@extends('layout.template_pages')

@section('title')
 | Announcing
@endsection()

@section('content1')
<div class="row">
  <div class="col-lg-4">
    <div class="box" style="height:100%">
      <div class="box-header with-border">
        <h3 class="box-title">Social Page</h3>
        <div class="box-tools pull-right">

        </div>
      </div>
      <div class="box-body no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
          </div><!-- /.btn-group -->
          <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <div class="pull-right">
            <div class="btn-group">
              <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
              <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div><!-- /.btn-group -->
          </div><!-- /.pull-right -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
              @foreach($pages as $page)
              <tr class="subject_page">
                <td><input type="checkbox" name="checked_page[]" value="{{ $page['page_id'] }}"/></td>
                <td class="mailbox-name">{{ $page['name'] }}</td>
                <td class="mailbox-subject">{{ $page['category'] }}</td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">{{ $page['likes'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table><!-- /.table -->
        </div><!-- /.mail-box-messages -->
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    @include('announce.feed')
  </div>
</div>

@endsection

@section('content')
<div class="page-content-wrapper full-height">
        <!-- START PAGE CONTENT -->
        <div class="content full-height" ng-controller="PageListCtrl">
        <input type="hidden" id="baseURL" value="{{ url('/') }}">
          <!-- START EMAIL -->
          <div class="email-wrapper">
            <!-- START EMAILS LIST -->
            <div class="email-list b-r b-grey"> <a class="email-refresh" href="#"><i class="fa fa-refresh"></i></a>
              <div id="emailList" class="list-view"><h2 class="list-view-fake-header"><i class="fa fa-facebook-official"></i> Facebook</h2>
                <!-- START EMAIL LIST SORTED BY DATE -->
                <!-- END EMAIL LIST SORTED BY DATE -->
              <div class="list-view-wrapper" data-ios="false">
                <div class="list-view-group-container">
                  <div class="list-view-group-header">
                    <span><i class="fa fa-facebook-official"></i> Facebook</span>
                  </div>
                    <ul class="no-padding">

                      <li name="page" class="item padding-15" ng-repeat="page in pageList" ng-click="getPostList(page.page_id, $index)" ng-class="{ 'active': $index == selectedIndex }" ng-cloak>                                 
                        <div class="thumbnail-wrapper d32 circular bordered b-info">                                     
                          <img width="40" height="40" alt="" ng-src="@{{ page.url_image }}">
                        </div>
                        <div class="checkbox  no-margin p-l-10">
                          <input type="checkbox" value="1" id="emailcheckbox-0-0">
                          <label for="emailcheckbox-0-0"></label>
                        </div>
                        <div class="inline m-l-15">
                          <p class="recipients no-margin hint-text small">@{{ page.category }}</p>
                          <p class="subject no-margin">@{{ page.name }}</p>
                          <p class="body no-margin">Likes : @{{ page.likes }}</p>
                        </div>
                        <div class="datetime"><span class="badge badge-important">300</span></div>
                        <div class="clearfix"></div>
                      </li>
  
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- END EMAILS LIST -->
            @include('announce.feed')
            </div>
            
            <!-- START OPENED EMAIL -->
            <div class="email-opened">
              @include('announce.thread')
            </div>
            <!-- END OPENED EMAIL -->
            <!-- START COMPOSE BUTTON FOR TABS -->
            <div class="compose-wrapper visible-xs">
              <a class="compose-email text-info pull-right m-r-10 m-t-10" href="email_compose.html"><i class="fa fa-pencil-square-o"></i></a>
            </div>
            <!-- END COMPOSE BUTTON -->
          </div>
          <!-- END EMAIL -->
        </div>
        <!-- END PAGE CONTENT -->
      </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('angular/ng-infinite-scroll.js') }}"></script>
  <script type="text/javascript" src="{{ asset('theme/theme_page/getting_started/html/assets/js/timeline.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/announce.js') }}"></script>
@endsection