@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bioRow">
            <div class="justifyFlexCenter">
               
                <div class=" col-lg-4 profileImage">
                    
                    <div id="profilePicture" style="background-image:url({{$user->avatarImage()}})" onclick="">
                        @if(Auth::user()->id == $user->id)
                         <form id="uploadPhoto"  enctype="multipart/form-data"></form>
                         <input type="file" id="uploadAvatar">
                        @endif
                     </div>
                     <button id="saveImage">Save</button>
                </div>
                <div class=" col-lg-8">
                    <div class="user_name">{{$user->name}}</div>
                    <div class="justifyFlex">
                        <div class="profileCounterBox"><span class="profileCounter">{{$user->countMemes()}}</span> memes</div>
                        <div class="profileCounterBox" data-toggle="modal" data-target="#followersModal"><span class="profileCounter">{{$user->countFollowers()}}</span> followers</div>
                        <div class="profileCounterBox" data-toggle="modal" data-target="#followingModal"><span class="profileCounter">{{$user->countFollowing()}}</span> following</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="justifyFlex">
                @foreach($memes as $meme)      
                    <div class="profileMeme">
                        <img src="{{asset('memes/'.$meme->image)}}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!--- MODALS -->

    <!-- FOLLOWERS MODAL -->
    <div class="modal fade" id="followersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($user->followers as $follower)
                    <div class="followBox">
                       
                        <span class="followName">
                             
                             <div class="memeUser">
                             
                                <div class="" style="background-image:url({{ $follower->avatarImage()}})" ></div> 
                                <span class="clearfix"></span>
                            </div>
                            {{$follower->name}}
                        </span>
                        @if(Auth::user()->id != $follower->id)
                            @if(Auth::user()->isFollower($follower->id))
                                <a class="folllowerBtn btn btn-warning" href="{{asset('unfollow/'.$follower->id)}}">Unfollow</a>
                            @else
                                <a  class="folllowerBtn btn btn-info" href="{{asset('invite/'.$follower->id)}}">Follow</a>
                            @endif
                        @endif
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
            
            </div>
        </div>
    </div>

    <!--- FOLLOWING MODAL -->
     <div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Following</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($user->followings as $following)
                    <div class="followBox">
                        
                        <span class="followName">
                            <div class="memeUser">
                             
                                <div class="" style="background-image:url({{ $following->avatarImage()}})" ></div> 
                                <span class="clearfix"></span>
                            </div>
                             {{ $following->name}}
                           </span>
                           
                        @if(Auth::user()->id != $following->id)
                        <a class="folllowerBtn btn btn-warning" href="{{asset('unfollow/'.$following->id)}}">Unfollow</a>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
            
            </div>
        </div>
    </div>
    <!--- END MODALS -->
@endsection