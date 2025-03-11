@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="overlay"></div>
        <div class="content">
            <div class="welcome-container">
                <h1 class="text-white">DUNDER MIFFLIN DATABASE</h1>
            </div>
        </div>
    </div>
@endsection

<style scoped>
.jumbotron {
    height: 100vh;
    background-image: url('https://www.gannett-cdn.com/presto/2020/03/23/USAT/c8d29efc-8433-4969-b675-e550ce3922b0-Ryan_then.jpeg?width=1184&format=pjpg&auto=webp&quality=50');
    background-size: cover;
    background-position: center;
    overflow: hidden;
    position: relative; /* Ensure the jumbotron is positioned relative for absolute children */
}

.overlay {
    position: absolute; /* Position absolute to cover the entire jumbotron */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
    z-index: 1; /* Ensure the overlay is above the background but below the content */
}

.content {
    position: relative; /* Position relative to ensure it appears above the overlay */
    z-index: 2; /* Ensure content is above the overlay */
    display: flex; /* Use flexbox to center content */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100%; /* Take full height of the jumbotron */
}

.welcome-container {
    text-align: center;
    h1{
        font-size: 4rem;
    }
    h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }
}
</style>
