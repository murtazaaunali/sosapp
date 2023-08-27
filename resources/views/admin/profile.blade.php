@extends('admin.layout.master') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-7">

            <ul class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
                <li><a class="c-tabs__link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                        aria-selected="true">Activity</a></li>

                <li><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                        aria-selected="false">Blocked Users</a></li>

                <li><a class="c-tabs__link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                        aria-selected="false">NDAs</a></li>

                <li><a class="c-tabs__link u-hidden-down@tablet" id="nav-customer-tab" data-toggle="tab" href="#nav-customer"
                        role="tab" aria-controls="nav-customer" aria-selected="false">Customer Invoices</a></li>
            </ul>

            <div class="c-tabs__content tab-content u-mb-large" id="nav-tabContent">
                <div class="c-tabs__pane active u-pb-medium" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <p class="u-text-mute u-text-uppercase u-text-small u-mb-xsmall">Today</p>

                    <div class="c-feed">
                        <div class="c-feed__item c-feed__item--fancy">
                            <p>Gerald Vaughn changed the status to QA on <strong>MA-86 - Retargeting Ads</strong></p>

                            <p class="c-feed__comment">I’ve prepared all sizes for you. Can you take a look tonight so we can prepare my final invoice?</p>

                            <span class="c-feed__meta">New Dashboard Design - 9:24PM</span>
                        </div>

                        <div class="c-feed__item c-feed__item--success">
                            <p>Gerald Vaughn commented on <strong>DA-459 - Mediation: Demand Source Logo Size</strong></p>

                            <span class="u-text-mute u-text-small">Portfolio Updates for Jason Carroll - 7:12PM</span>
                        </div>

                        <div class="c-feed__item c-feed__item--fancy">
                            <p>Gerald Vaughn changed the status to QA on <strong>MA-45 - Finish Prototype</strong></p>

                            <span class="c-feed__meta">New Dashboard Design - 11:30AM</span>
                        </div>
                    </div>
                    <!-- // .c-feed -->

                    <p class="u-text-mute u-text-uppercase u-text-small u-mb-xsmall">Yesterday</p>

                    <div class="c-feed">
                        <div class="c-feed__item c-feed__item--info">
                            <p>Gerald Vaughn attached 5 files to <strong>9054 - Find good stocks for our Instagram channel</strong></p>

                            <div class="c-feed__gallery">

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed1.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed2.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed3.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed4.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed5.jpg" alt="Images' title">
                                </div>

                            </div>

                            <span class="c-feed__meta">Marketing Templates & Strategy - 7:59AM</span>
                        </div>

                        <div class="c-feed__item c-feed__item--success">
                            <p>Gerald Vaughn commented on <strong>Find good stocks for our Instagram channel</strong></p>

                            <p class="c-feed__comment">What do you think about these? Should I continue in this style?</p>

                            <span class="c-feed__meta">Marketing Templates & Strategy - 7:58AM</span>
                        </div>

                        <div class="c-feed__item c-feed__item--fancy">
                            <p>Gerald Vaughn changed the status to In Progress on <strong>Find good stocks for our Instagram channel</strong></p>
                            <span class="c-feed__meta">Marketing Templates & Strategy - 6:30AM</span>
                        </div>
                    </div>
                    <!-- // .c-feed -->

                    <p class="u-text-mute u-text-uppercase u-text-small u-mb-xsmall">28 January</p>

                    <div class="c-feed u-mb-zero">
                        <div class="c-feed__item c-feed__item--success">
                            <p>Gerald Vaughn attached 6 files to <strong>1007 - Background Inspiration</strong></p>

                            <div class="c-feed__gallery">

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed7.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed8.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed9.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed3.jpg" alt="Images' title">
                                </div>

                                <div class="c-feed__gallery-item">
                                    <img src="img/feed2.jpg" alt="Images' title">
                                </div>
                                <div class="c-feed__gallery-item">
                                    <img src="img/feed1.jpg" alt="Images' title">
                                </div>

                            </div>

                            <span class="c-feed__meta">Templates & Inspiration - 11:50AM</span>
                        </div>
                    </div>
                    <!-- // .c-feed -->

                </div>

                <div class="c-tabs__pane u-pb-medium" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo
                        incidunt exercitationem nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum
                        in, nam.</p>

                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt
                        quod, est veniam, earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti
                        in!
                    </p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea distinctio nostrum molestias assumenda,
                        repudiandae consequuntur quae pariatur aut incidunt placeat doloremque doloribus! Recusandae nostrum
                        dolore repudiandae libero mollitia, rem eveniet.</p>
                </div>

                <div class="c-tabs__pane u-pb-medium" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo
                        incidunt exercitationem nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum
                        in, nam.</p>

                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt
                        quod, est veniam, earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti
                        in!
                    </p>
                </div>

                <div class="c-tabs__pane u-pb-medium" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo
                        incidunt exercitationem nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum
                        in, nam.</p>

                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt
                        quod, est veniam, earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti
                        in!
                    </p>

                    <p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt
                        quod, est veniam, earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti
                        in!
                    </p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo
                        incidunt exercitationem nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum
                        in, nam.</p>
                </div>
            </div>

        </div>

        <div class="col-xl-5">
            <div class="c-card u-p-medium u-mb-medium">
                    @php $picture_url = Storage::url($Profile->picture); @endphp
                <div class="u-text-center">
                    @if($Profile->picture)
                    <div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
                        <img class="c-avatar__img" src="{{ url($picture_url) ?? '' }}" alt="{{ $Profile->name }}">
                    </div>
                    @endif
                    <h3 class="u-h5">{{ $Profile->name ?? '' }}</h3>
                    <p>{{$Profile->email ?? ''}}</p>
                    @php $date_joined = date("d F, Y", strtotime($Profile->created_at)); 
@endphp
                    <span class="u-text-mute u-text-small">Created at {{ $date_joined ?? '' }}</span>
                </div>

                <div class="c-card u-p-medium u-text-small u-mb-small">
                    <h6 class="u-text-bold">General Info</h6>

                    <dl class="u-flex u-pv-small u-border-bottom">
                        <dt class="u-width-25">First name</dt>
                        <dd>{{ $Profile->first_name ?? '' }}</dd>
                    </dl>
                    <dl class="u-flex u-pv-small u-border-bottom">
                        <dt class="u-width-25">Last name</dt>
                        <dd>{{ $Profile->last_name ?? '' }}</dd>
                    </dl>
                    <dl class="u-flex u-pv-small u-border-bottom">
                        <dt class="u-width-25">Email</dt>
                        <dd>{{ $Profile->email ?? '' }}</dd>
                    </dl>
                    <dl class="u-flex u-pv-small u-border-bottom">
                        <dt class="u-width-25">Picture
                        </dt>
                        <dd>
                            @if($Profile->picture)
                            <a class="c-avatar c-avatar--small" href="#">
                                   
                                <img class="c-avatar__img" src="{{ url($picture_url) ?? '' }}" alt="{{ $Profile->name }}">
                            </a> @else N/A @endif
                        </dd>
                    </dl>
                </div>
                <div class="u-flex u-mt-medium">
                    <button type="button" class="c-btn c-btn--info c-btn--fullwidth u-mr-xsmall" data-toggle="modal" data-target="#modal1">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="c-modal modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">
            
            <form id="ProfileForm" action="{{ url('/admin/save_profile') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="c-modal__header">
                    <h3 class="c-modal__title">Edit Profile</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
                </div>
                <div class="c-modal__body">
                    <div class="c-field">
                        <label class="c-field__label" for="first_name">First Name</label>
                        <input class="c-input" id="first_name" name="first_name" type="text" value="{{ $Profile->first_name }}">
                    </div>
                    <div class="c-field">
                        <label class="c-field__label" for="last_name">Last Name</label>
                        <input class="c-input" id="last_name" name="last_name" type="text" value="{{ $Profile->last_name }}">
                    </div>
                    <div class="c-field">
                        <label class="c-field__label" for="email">Email</label>
                        <input class="c-input" id="email" name="email" type="text" readonly value="{{ $Profile->email }}">
                    </div>
                    <div class="c-field">
                        <label class="c-field__label" for="email">Password</label>
                        <input class="c-input" id="email" name="password" type="password" value="{{ $Profile->password }}">
                    </div>
                    <div class="c-field">
                        <label class="c-field__label" for="email">Confirm Password</label>
                        <input class="c-input" id="email" name="password_confirmation" type="password" value="{{ $Profile->password }}">
                    </div>
                    <div class="c-field">
                        <label class="c-field__label" for="picture">Picture</label>
                        <input class="c-input" id="picture" name="picture" type="file" value="{{ $Profile->picture }}">
                    </div>
                </div>
                <div class="c-modal__footer">
                    <button type="submit" class="c-btn c-btn--info c-btn--fullwidth u-mr-xsmall">Save</button>
                </div>
            </form>
        </div>
        <!-- // .c-modal__content -->
    </div>
    <!-- // .c-modal__dialog -->
</div>
<!-- // .c-modal -->
<!-- // .container-fluid -->

<script>
    $(document).on('submit', 'form#ProfileForm', function (event) {
                  event.preventDefault();
                  var form = $(this);
                  var data = new FormData($(this)[0]);
                  var url = form.attr("action");
                  $.ajax({
                      type: form.attr('method'),
                      url: url,
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function(result)
                      {
                        console.log(result);
                        if(result === 'true') {
                           location.reload();
                        }
                      },
                      error: function(data)
                      {
                        console.log(data);
                      }
                  });
                  return false;
              });
</script>
@endsection