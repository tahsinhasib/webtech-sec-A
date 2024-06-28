<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Book-Borrowing-System/assets/css/styles.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

     <title>Bookie</title>
</head>


<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">Bookie</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">Bookie</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                    </div>
                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
                <div class="userProfile">
                    <i class='bx bxs-user'></i>
                </div>
            </div>
        </div>
    </nav>

    <div class="card-container">
        <div class="card">
            <div class="card-content">
                <img src="/Book-Borrowing-System/assets/img/book-1.jpg" alt="">
                <h3>Playing In The Rain</h3>
                <p>by Sandra J. Jackson</p>
                <div class="caption-container">
                    <p class="caption">When the effects of a hypnosis-inducing drug fade, April slowly begins a conscious awakening. Memories of her past are unclear, and she has no recollection of her identity or whereabouts. As the days slip by, April realizes there is more to life than existing when she is introduced to an occupant who does just that - her sister.</p>
                </div>
                <a href="" class="card-book-button">Borrow</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="/Book-Borrowing-System/assets/img/book-2.jpg" alt="">
                <h3>The Way We Forgive</h3>
                <p>by R. F. Whong</p>
                <div class="caption-container">
                    <p class="caption">Can a pastor's wife learn to forgive?
                        "A remarkable account of a real-life story"
                        “A touching story about forgiveness.”</p>
                </div>
                <a href="" class="card-book-button">Borrow</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="/Book-Borrowing-System/assets/img/book-3.jpg" alt="">
                <h3>Galactic Terror</h3>
                <p>by Michael Robertson</p>
                <div class="caption-container">
                    <p class="caption">They say you can’t run from your past, and now she’s reached the other side of the galaxy, Sparks wonders if they’re right …</p>
                </div>
                <a href="" class="card-book-button">Borrow</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="/Book-Borrowing-System/assets/img/book-4.jpg" alt="">
                <h3>May It Please The Court</h3>
                <p>by Daniel Maldonado</p>
                <div class="caption-container">
                    <p class="caption">After a Sweet Sixteen ceremony, Reyna Clifton - the mother of the birthday girl - is found severely injured at the bottom of the grand staircase of the Regal Phoenix Resort and Spa. The Clifton family blames the resort and sues for negligence. Daniel Mendoza and his firm are called in to defend the lawsuit.</p>
                </div>
                <a href="" class="card-book-button">Borrow</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="/Book-Borrowing-System/assets/img/book-5.jpg" alt="">
                <h3>The Guardian</h3>
                <p>by James Leonard</p>
                <div class="caption-container">
                    <p class="caption">Surry Weathers spent a decade behind bars for a murder he didn't commit. Now free, his ex-wife Rosa needs protection from Duffy, a man bent on making her disappear. Can they overcome the odds, or will their past mistakes lead to their downfall?</p>
                </div>
                <a href="" class="card-book-button">Borrow</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="/Book-Borrowing-System/assets/img/book-6.jpg" alt="">
                <h3>Within and Without Time</h3>
                <p>by D. I. Hennessey</p>
                <div class="caption-container">
                    <p class="caption">A boy is caught up in a miraculous adventure that transforms his life and changes the world! Like an intense roller coaster, the journey he experiences is exciting and unpredictable. Heartwarming, as well as heart-rending. Be prepared to laugh and cry, to be inspired, and find your heart rejoicing!</p>
                </div>
                <a href="" class="card-book-button">Borrow</a>
            </div>
        </div>
    </div>


    <div class="form-section">
        <div class="form-container">
            <h3>User Information</h3>
            <form action="process.php" class="form" method="post">
                <div class="input-box">
                    <label for="">Username</label>
                    <input type="text" placeholder="Username" name="username" >
                </div>
                <div class="input-box">
                    <label for="">Student ID</label>
                    <input type="text" placeholder="Student ID" name="studentid" >
                </div>
                <div class="input-box">
                    <div class="form-select-box">
                        <select name ="book">
                            <option>Select Book</option>
                            <option value="Playing In The Rain">Playing In The Rain</option>
                            <option value="The Way We Forgive">The Way We Forgive</option>
                            <option value="Galactic Terror">Galactic Terror</option>
                            <option value="May It Please The Court">May It Please The Court</option>
                            <option value="The Guardian">The Guardian</option>
                            <option value="Within and Without Time">Within and Without Time</option>
                        </select>
                    </div>
                </div>


                <div class="form-column">
                    <div class="input-box">
                        <label for="">Borrow Date</label>
                        <input type="date"  name="bdate">
                    </div>
                    <div class="input-box">
                        <label for="">Return Date</label>
                        <input type="date" name="rdate"  >
                    </div>
                </div>

                <button type="submit" name="submit" value="Set">Submit</button>
            </form>
        </div>
    </div>
    




<script>

const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }

// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });

// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});

</script>

</body>
</html>