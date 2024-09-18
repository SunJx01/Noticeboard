@component('components.navbar', ['nav_btn' => $nav_btn])
@endcomponent

<div class="admin-dashboard">
@component('components.newgroup')
@endcomponent
    <div class="welcome-msg">
        <h1>Welcome to the Notice Board</h1>
        <p>We're glad to have you here! Please make sure to regularly check for the latest notices to stay informed about important updates and announcements. Your timely attention to these notices is crucial to ensure you’re always up to date.</p><br>
        <p>As a reminder, while using the Notice Board, please be mindful of the language you use and adhere to the rules and regulations. All messages should be respectful, considerate, and professional. Let's work together to maintain a positive and constructive environment for everyone.</p>
    </div><br><br><br>
    
    <form action="{{route('dashboardAdmin')}}" method="get">
        <div class="create-input">
            <br><h2>Manage User/Moderators</h2><br><br>
            <input type="text" placeholder="Search by username" name="search"><br><br><br><br>
        </div>
    </form>

    <form action="{{route('adduser')}}" name="create" method="post">
        @csrf
        <div class="create-input">
            <h2>Create New User</h2>
            <input type="text" placeholder="Username" name="username">
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('username'){{$message}}@enderror</span><br>

            <input type="password" placeholder="Password" name="password">
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('password'){{$message}}@enderror</span><br>

            <div class="form-btn">
                <button type="submit">Create</button>
            </div>
        </div>
    </form>
    
    <div class= "data-container">
        <h2>Your Moderators</h2>
        <table class="styled-table">
         <thead>
            <tr>
               <th>Username</th>
               <th>Role</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($datamods as $item)
               <tr>
                  <td>{{ $item->username }}</td>
                  <td>{{ $item->role }}</td>
                  <td>
                  <form action="{{route('make_user')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button>Make User</button>
                     </form> 
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>

    </div>
    <div class= "data-container">
        <h2>Your Users</h2>
        <table class="styled-table">
         <thead>
            <tr>
               <th>Username</th>
               <th>Role</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($datausers as $item1)
               <tr>
                  <td>{{ $item1->username }}</td>
                  <td>{{ $item1->role }}</td>
                  <td>
                     <form action="{{route('make_mod')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item1->id }}">
                        <button>Make Mod</button>
                     </form> 
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>  

    </div>

    

</div>

<style>
    body {
        display: flex; 
        margin: 0; 
        height: 100vh; 
    }
    .admin-dashboard{
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
        height: fit-content;
        width: 47%;
    }
    .data-container{
        float: right;
        color: lightgoldenrodyellow;
        width: fit-content;
        height: fit-content;
        min-width: 47%;
        border: 4px solid goldenrod;
        border-radius: 20px;
        margin: 10px;
        padding: 20px;
    }   
    .data-container input{
        background-color: lightgoldenrodyellow;
        width: 100%;
        border-radius: 5px;
        margin: 5px;
        padding: 5px;
    }
    table {
        width: 100%;
        border-collapse: separate;
        margin-top: 25px;
        padding: 10px;
        font-size: large;
        max-width: 100%; 
        height: auto; 

    }

   table, th, td {
        border: 1px solid lavender;
        padding: 08px;
    }

   th, td {
         text-align: left;
    }

   th {
        background-color: lavender;
         color: goldenrod;
    }

   tr:hover {
         background-color: #f5f5f5;
    }

   tr:nth-child(even) {
         background-color: #f9f9f9;
    }

   td {
        background-color: lightgoldenrodyellow;
         color: #09143C;
    }
   td button{
        background-color: #09143C;
        color: lightgoldenrodyellow;
        padding: 5%;
        border: 1px solid goldenrod;
        border-radius: 5px;
        font-size: small;
        width: 100%;
    }
   td button:hover{
        background-color: lavender;
        color: #09143C;
    }
   td form{
        padding: 0px;
        color: none;
        background-color: none;
        border: none;
        border-radius: 5px;
        margin-left: 20%;
        margin-right: 20%;    
    }

</style>
