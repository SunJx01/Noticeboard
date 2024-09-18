@component('components.navbar', ['nav_btn' => $nav_btn])
@endcomponent
<div class="content-box">
    <div class="posts-box">
        <div class="posts-preview">
            @if(!empty($arrayData) && is_array($arrayData))
                @foreach($arrayData as $post)
                    @if(is_array($post))
                    <div class="post-flex">
                            <div class="date">
                                @if($author)
                                Date: {{$author[1]}}
                                <br>
                                Author: {{$author[0]}}
                                @endif
                            </div>
                            <h1>{{ $post['key'] ?? 'Default Title' }}</h1>
                            <p style="font-style: italic; color:black">{{ $post['another_key'] ?? 'Default Subtitle' }}</p><br>
                            <p>{{ $post['third_key'] ?? 'Default Content' }}</p>
                        </div>
                    @else
                        <div>No valid post data available.</div> 
                    @endif
                @endforeach
            @else
                <div>No Posts Yet</div>
            @endif
        </div>
        <div class="new-posts">
            <form action="{{route('posts')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="grp" value="{{$group_name}}">
                <input type="text" name="title" placeholder="Title" style="width: 85%;" require>
                <button type="submit">Post</button>
                <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('title'){{$message}}@enderror</span>
                
                <input type="text" name="sub-title" placeholder="Subtitle">
                <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('sub-title'){{$message}}@enderror</span><br>

                <textarea id="post-content"  name="post-content" rows="15" cols="50" placeholder="Enter your content here" require></textarea>
                <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('post-content'){{$message}}@enderror</span><br>

            </form>
        </div>
    </div>
</div>
<div class="side-bar">
    
    
    <h1 style="font-size: x-large;">{{$group_name}}</h1><br><br>
    <div class="grp-mem">
        <br><h2>Group Members:</h2><br>
        
        @foreach($member as $info)
            <div class="mem-info">
                <h5>{{$info->username}}</h5>
                <h6>{{$info->role}}</h6>
            </div>  
        @endforeach

    </div>


</div>

<script>
    window.onload = function() {
        var postDiv = document.getElementsByClassName('posts-preview');
        if (postDiv) {
            postDiv.scrollTop = postDiv.scrollHeight;
        }
    };
</script>


<style>
    body {
        display: flex; 
        margin: 0; 
        height: 100vh; 
    }
    .content-box{
        background-color: #09143C;
        width: 83%;
        float: right;
        height: 100%;
        border: 0.5px solid goldenrod;
        display: block;
        
    }
    ::-webkit-scrollbar {
        width: 1px;
    }

    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 1px;
    }

    ::-webkit-scrollbar-thumb {
        background: goldenrod;
        border-radius: 1px;
    }
    .side-bar{
        color: goldenrod;
        background-color: #09143C;
        border: 0.5px solid goldenrod;
        width: 20%;
        float: right;
        height: 100%;
        padding: 10px;
        overflow: auto;
      
    }
    .grp-mem{
        background-color: #09143C;
        color: lavender;
        border-radius: 5px;
        border: 0.5px solid lightgoldenrodyellow;
        padding: 10px;
    }
    .grp-mem h2{
        color: goldenrod;
        padding: 5px;
    }
    .mem-info{
        color: lightgoldenrodyellow;
        font-family: cursive;
        padding: 10px;
        border-radius: 5px;
        border: 0.5px solid lavender;
        margin: 5px;
    }
    .posts-preview{
        background-color: lightgoldenrodyellow;
        color: lightgoldenrodyellow;
        width: 100%;
        height: 70%;
        border: 0.5px solid goldenrod;
        overflow: auto;
        padding: 8px;
        scroll-behavior: smooth;
    }
    .date{
        background-color: lavender;
        border: 0.5px goldenrod;
        color: lavender;
        padding: 15px;
        margin: 5px;
        color: goldenrod;
    }
    .post-flex{
        background-color: lavender;
        margin: 5px;
        padding: 15px;
        color: #09143C;
        border: 0.5px solid goldenrod;
        border-radius: 5px;
        font-family: cursive;
    }
    .new-posts{
        width: 100%;
        background-color: lavender;
        padding: 10px;
        height: 30%;
        overflow: auto;
        border: 0.5px solid goldenrod;
    }
    .new-posts input{
        width: 99%;
        padding: 8px;
        margin: 2px;
        background-color: lightgoldenrodyellow;
    }
    .new-posts textarea{
        width: 99%;
        padding: 8px;
        height: 125px;
        margin: 2px;
        background-color: lightgoldenrodyellow;
    }
    .new-posts form{
        background-color: lavender;
        border: none;
        padding: 0px;
        margin: 0px;
        float: none;
        width: 100%;
    }
    .new-posts button{
        background-color: goldenrod;
        color: #09143C;
        font-family: cursive;
        width: 13%;
        padding: 6px;
    }
    .new-posts button:hover{
        background-color: lightgoldenrodyellow;
        color: goldenrod;
    }
</style>