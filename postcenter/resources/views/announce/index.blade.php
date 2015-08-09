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
        <div class="content full-height">
          <!-- START EMAIL -->
          <div class="email-wrapper">
            <!-- START EMAILS LIST -->
            <div class="email-list b-r b-grey"> <a class="email-refresh" href="#"><i class="fa fa-refresh"></i></a>
              <div id="emailList" class="list-view"><h2 class="list-view-fake-header">Today April 23</h2>
                <!-- START EMAIL LIST SORTED BY DATE -->
                <!-- END EMAIL LIST SORTED BY DATE -->
              <div class="list-view-wrapper" data-ios="false">
                <div class="list-view-group-container">
                  <div class="list-view-group-header">
                    <span>Today April 23</span>
                  </div>
                    <ul class="no-padding">
                      @foreach($pages as $page)
                      <li class="item padding-15" data-email-id="1">                                 
                        <div class="thumbnail-wrapper d32 circular bordered b-info">                                     
                          <img width="40" height="40" alt="" src="{{ $page['url_image'] }}">
                        </div>
                        <div class="checkbox  no-margin p-l-10">
                          <input type="checkbox" value="1" id="emailcheckbox-0-0">
                          <label for="emailcheckbox-0-0"></label>
                        </div>
                        <div class="inline m-l-15">
                          <p class="recipients no-margin hint-text small">{{ $page['category'] }}</p>
                          <p class="subject no-margin">{{ $page['name'] }}</p>
                          <p class="body no-margin">Likes : {{ $page['likes'] }}</p>
                        </div>
                        <div class="datetime"><span class="badge badge-important">300</span></div>
                        <div class="clearfix"></div>
                      </li>
                      @endforeach()
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- END EMAILS LIST -->
            <!-- START OPENED EMAIL -->
            <div class="email-opened">
              <div class="no-email">
                <h1>No email has been selected</h1>
              </div>
              <div class="email-content-wrapper" style="display:none">
                <div class="actions-wrapper menuclipper bg-master-lightest">
                  <ul class="actions menuclipper-menu no-margin p-l-20 ">
                    <li class="visible-sm-inline-block visible-xs-inline-block">
                      <a href="#" class="email-list-toggle"><i class="fa fa-angle-left"></i> All Inboxes
                                </a>
                    </li>
                    <li class="no-padding "><a href="#" class="text-info">Reply</a>
                    </li>
                    <li class="no-padding "><a href="#">Reply all</a>
                    </li>
                    <li class="no-padding "><a href="#">Forward</a>
                    </li>
                    <li class="no-padding "><a href="#">Mark as read</a>
                    </li>
                    <li class="no-padding "><a href="#" class="text-danger">Delete</a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="email-content">
                  <div class="email-content-header">
                    <div class="thumbnail-wrapper d48 circular bordered">
                      <img width="40" height="40" alt="" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar2x.jpg">
                    </div>
                    <div class="sender inline m-l-10">
                      <p class="name no-margin bold">
                      </p>
                      <p class="datetime no-margin"></p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="subject m-t-20 m-b-20 semi-bold">
                    </div>
                    <div class="fromto">
                      <div class="pull-left">
                        <div class="btn-group dropdown-default">
                          <a class="btn dropdown-toggle btn-small btn-rounded" data-toggle="dropdown" href="#">
                                        David Nester
                                        <span class="caret"></span>
                                        </a>
                          <ul class="dropdown-menu" style="width: 129px;">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Friend</a>
                            </li>
                            <li><a href="#">Report</a>
                            </li>
                          </ul>
                        </div>
                        <label class="inline">
                          <span class="muted">&nbsp;&nbsp;to</span>
                          <span class=" small-text">johnsmith@skyace.com</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="email-content-body m-t-20">
                  </div>
                  <div class="wysiwyg5-wrapper b-a b-grey m-t-30">
                    <textarea class="email-reply" placeholder="Reply"></textarea>
                  </div>
                </div>
              </div>
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
  <script type="text/javascript" src="{{ asset('js/announce.js') }}"></script>
@endsection