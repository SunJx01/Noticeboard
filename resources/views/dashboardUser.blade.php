@component('components.navbar', ['nav_btn' => $nav_btn])
@endcomponent

<div class="user-dashboard">
    <div class="welcome-msg">
        <h1>Welcome to the Notice Board</h1>
        <p>We're glad to have you here! Please make sure to regularly check for the latest notices to stay informed about important updates and announcements. Your timely attention to these notices is crucial to ensure you’re always up to date.</p><br>
        <p>As a reminder, while using the Notice Board, please be mindful of the language you use and adhere to the rules and regulations. All messages should be respectful, considerate, and professional. Let's work together to maintain a positive and constructive environment for everyone.</p>
    </div><br><br><br>
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
</style>
