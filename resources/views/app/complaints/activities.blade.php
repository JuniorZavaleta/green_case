@extends('app.layout.base')

@section('content')
<!-- START timeline-->
<ul class="timeline">
   <li data-datetime="Today" class="timeline-separator"></li>
   @foreach( $complaint->activities as $activity )
      @if( $activity->id % 2 == 0 )
         <!-- START timeline item-->
         <li>
            <div class="timeline-badge primary">
               <em class="fa fa-comment"></em>
            </div>
            <div class="timeline-panel">
               <div class="popover left">
                  <div class="arrow"></div>
                  <div class="popover-content">
                     <div class="table-grid table-grid-align-middle mb">
                        <div class="col">
                           <p class="m0">
                              <a class="text-muted">
                                 <strong>{{ $activity->title }}</strong>
                              </a></p>
                        </div>
                     </div>
                     <p>
                        <em>{{ $activity->description }}</em>
                     </p>
                     <div class="row">
                        @foreach($activity->images as $image)
                           <div class="col-md-4">
                              <img src="{{ $image->img }}" alt="Img" class="img-responsive">
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <!-- END timeline item-->
      @else
         <!-- START timeline item-->
         <li class="timeline-inverted">
            <div class="timeline-badge primary">
               <em class="fa fa-comment"></em>
            </div>
            <div class="timeline-panel">
               <div class="popover right">
                  <div class="arrow"></div>
                  <div class="popover-content">
                     <div class="table-grid table-grid-align-middle mb">
                        <div class="col">
                           <p class="m0">
                              <a class="text-muted">
                                 <strong>{{ $activity->title }}</strong>
                              </a></p>
                        </div>
                     </div>
                     <p>
                        <em>{{ $activity->description }}</em>
                     </p>
                     <div class="row">
                        @foreach($activity->images as $image)
                           <div class="col-md-4">
                              <img src="{{ $image->img }}" alt="Img" class="img-responsive">
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <!-- END timeline item-->
      @endif
   @endforeach
   <!-- START timeline item-->
   <li class="timeline-end">
      <a href="#" class="timeline-badge">
         <em class="fa fa-plus"></em>
      </a>
   </li>
   <!-- END timeline item-->
</ul>
<!-- END timeline-->
@endsection