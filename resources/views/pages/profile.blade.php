@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bioRow">
            <div class="row">
                <div class=" col-lg-4 profileImage">
                    <?php $avatarImage = "";
                        if(Auth::user()->social_login = 0):
                        $avatarImage = asset('images/'.Auth::user()->avatar);
                        else:
                        $avatarImage = Auth::user()->avatar;
                        endif;

                    ?>
                    <div  id="profilePicture" style="background-image:url({{$avatarImage}})" onclick="">
                         <form id="uploadPhoto"  enctype="multipart/form-data"></form>
                         <input type="file" id="uploadAvatar">
                     </div>
                     <button id="saveImage">Save</button>
                </div>
                <div class=" col-lg-8">
                    <div class="user_name">{{Auth::user()->name}}</div>
                    <div class="row">
                        <div >18 memes</div>
                        <div data-toggle="modal" data-target="#followersModal">{{Auth::user()->countFollowers()}} followers</div>
                        <div data-toggle="modal" data-target="#followingModal">{{Auth::user()->countFollowing()}} following</div>
                    </div>
                </div>
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
                @foreach(Auth::user()->followers as $follower)
                    <div>{{$follower->name}}</div>
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
                @foreach(Auth::user()->followings as $following)
                    <div class="followRow">
                        
                        {{$following->name}}
                    </div>
                @endforeach
            </div>
            
            </div>
        </div>
    </div>
    <!--- END MODALS -->
@endsection