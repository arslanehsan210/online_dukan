<div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse  position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach($menu as $items)   
                   
                    @if(!empty($items->subcategory_id))

                    <div class="nav-item dropdown">
                    <a href="{{route('filt',[$items->id])}}" class="nav-link" data-toggle="dropdown"> <i class="fa fa-angle-down float-right mt-1"> </i>{{$items->category_name}}</a>


                    

                    @foreach($submenu as $sm)
                    

                    @if($sm->category_id == $items->id)     
  
                    <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                          <a href="{{route('sb',[$sm->id])}}" class="dropdown-item"> <?php echo $sm->subcategory_name;  ?></a>
                          </div>  
                    
                          
                    @endif
                    @endforeach

                    </div>
@else
                    <a  href="{{route('filt',[$items->id])}}" class="nav-item nav-link">{{$items->category_name}}</a>


                    @endif

                            
                        @endforeach
                    </div>
                </nav>
            </div>