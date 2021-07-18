<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" 
    integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Mombasa Camps</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');

* {
  box-sizing: border-box;
}

body {
  font-family: 'Lato', sans-serif;
  background-color: #333;
  color: #222;
  overflow-x: hidden;
  margin: 0;
}

.container {
  background-color: #fafafa;
  transform-origin: top left;
  transition: transform 0.5s linear;
  width: 100vw;
  min-height: 100vh;
  padding: 50px;
}

.container.show-nav {
  transform: rotate(-20deg);
}

.circle-container {
  position: fixed;
  top: -100px;
  left: -100px;
}

.circle {
  background-color: #ff7979;
  height: 200px;
  width: 200px;
  border-radius: 50%;
  position: relative;
  transition: transform 0.5s linear;
}

.container.show-nav .circle {
  transform: rotate(-70deg);
}

.circle button {
  cursor: pointer;
  position: absolute;
  top: 50%;
  left: 50%;
  height: 100px;
  background: transparent;
  border: 0;
  font-size: 26px;
  color: #fff;
}

.circle button:focus {
  outline: none;
}

.circle button#open {
  left: 60%;
}

.circle button#close {
  top: 60%;
  transform: rotate(90deg);
  transform-origin: top left;
}

.container.show-nav + nav li {
  transform: translateX(0);
  transition-delay: 0.3s;
}

nav {
  position: fixed;
  bottom: 40px;
  left: 0;
  z-index: 100;
}

nav ul {
  list-style-type: none;
  padding-left: 30px;
}

nav ul li {
  text-transform: uppercase;
  color: #fff;
  margin: 40px 0;
  transform: translateX(-100%);
  transition: transform 0.4s ease-in;
}

nav ul li i {
  font-size: 20px;
  margin-right: 10px;
}
nav >ul> li> i>a {
 text-decoration:none;
}

nav ul li + li {
  margin-left: 15px;
  transform: translateX(-150%);
}

nav ul li + li + li {
  margin-left: 30px;
  transform: translateX(-200%);
}

.content img {
  max-width: 100%;
}

.content {
  max-width: 1000px;
  margin: 50px auto;
}

.content h1 {
  margin: 0;
 
}

.content small {
  color: green;
  font-style: italic;
}

.content p {
  color: #333;
  line-height: 1.5;
 
} .evans{
      color:yellow;
  }.hello{
  margin-top: 0px;
  display:flex;
  justify-content:center;
  align-items:center;
}

    </style>
  </head>
  <body>
  <div class="hello">
        <a href="/"> <button class="btn btn-secondary"><h1>Go Back</h1></button></a>
        </div>
    <div class="container">
      <div class="circle-container">
        <div class="circle">
          <button id="close">
            <i class="fas fa-times"></i>
          </button>
          <button id="open">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>

      <div class="content">
        <h1>Amazing Article mombasa</h1>
        <small class="evans">“The world is a book and those who do not travel read only one page.” ~ </small>
<p>It is not the destination where you end up but the mishaps and memories you create along the way</p>
        <h3>Overview</h3>
        <img src="https://images.pexels.com/photos/5480740/pexels-photo-5480740.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="doggy" />
        <h3>Overview</h3>
        <img src="https://cdn-bmalj.nitrocdn.com/uirOOtSrYrqqUksKHkiSCjZGZlPeXsmk/assets/static/optimized/rev-0404f4f/images/Best-Travel-Quotes-someday-be-free.jpg" alt="doggy" />
<p>Live with no excuses and travel with no regrets</p>      
    </div>
    </div>

    </nav>
   <script>
       const open = document.getElementById('open')
const close = document.getElementById('close')
const container = document.querySelector('.container')

open.addEventListener('click', () => container.classList.add('show-nav'))

close.addEventListener('click', () => container.classList.remove('show-nav'))
   </script>
  </body>
</html>
