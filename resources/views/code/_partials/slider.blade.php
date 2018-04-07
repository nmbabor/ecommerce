
<section class="main-slider-area">
    <div class="slider-area">
        <!--Slider Area Start-->
        <div class="fullwidthbanner-container">                 
            <div class="fullwidthbanner-three">
                <ul> 
                @foreach($allData['slider'] as $slider)                               
                    <!-- Slide -->
                    <li class="slider" data-transition="random" data-slotamount="7" data-masterspeed="300">                         
                        <!-- Main Image-->
                            <img src='{{asset("public/img/slides/$slider->slide_photo")}}' alt="{{$slider->slide_caption}}"  data-bgposition="center top" data-bgrepeat="no-repeat" data-bgpositionend="center center">           
                        <!-- Layer One -->
                        <div class="tp-caption  randomrotate start"
                            data-x="center"
                            data-y="center" data-voffset="-85"
                            data-start="800" 
                            data-speed="800" 
                            data-easing="Power2.easeOut" 
                            data-captionhidden="off" 
                            data-endeasing="Power1.easeIn" 
                            data-endspeed="1500"
                            style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;background-color: transparent; font-size: 35px; font-weight:400; color: #ef5656; text-transform: uppercase;translate3d(0px, 0px, 0px)">{{$slider->slide_caption}}

                        </div>
                        
                    </li>
                @endforeach
                </ul>                                               
            </div>                  
        </div>
        <!--End of Slider Area-->
    </div>
</section>