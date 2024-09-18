@component('components.navbar', ['nav_btn' => $nav_btn])
@endcomponent

<div class="user-dashboard">
    <div class="welcome-msg">
        <h1>Welcome to the Notice Board</h1>
        <p>We're glad to have you here! Please make sure to regularly check for the latest notices to stay informed about important updates and announcements. Your timely attention to these notices is crucial to ensure you’re always up to date.</p><br>
        <p>As a reminder, while using the Notice Board, please be mindful of the language you use and adhere to the rules and regulations. All messages should be respectful, considerate, and professional. Let's work together to maintain a positive and constructive environment for everyone.</p>
    </div><br><br><br>
    <form action="{{route('adduser')}}" name="create" method="post">
        @csrf
        <div class="create-input">
            <h2>Create New User</h2>
            <input type="text" placeholder="Username" name="username">
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('username'){{$message}}@enderror</span><br>

            <input type="password" placeholder="Password" name="password">
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('password'){{$message}}@enderror</span><br>

                <button type="submit">Create</button>
        </div>
    </form>

</div>

<style>
    body {
        display: flex; 
        margin: 0; 
        height: 100vh; 
    }
    .user-dashboard{
        background-color: #09143C;
        width: 83%;
        float: right;
        height: 100%;
        border: 0.5px solid goldenrod;
        overflow: auto;
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
    .welcome-msg{
        color: lightgoldenrodyellow;
        padding: 30px;
    }
    h2{
        color: lightgoldenrodyellow;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 5px;
    }
    .create-input input{
        background-color: lightgoldenrodyellow;
        width: 100%;
        border-radius: 5px;
        margin: 5px;
        padding: 5px;
    }
    .create-input button{
        background-color: lightgoldenrodyellow;
        float: right;
        border-radius: 5px;
        color: #09143C;
        padding: 8px;
        cursor: pointer;
        border: 3px solid goldenrod;
    }
    .create-input button:hover{
        background-color: lavender;
        color: #09143C;
    }
    form{
        width: 80%;
        border: 0.5px solid goldenrod;
        padding: 15px;
        margin: 10%;
        height: 30%;
        display: block;
        border-radius: 10px;
    }
</style>
