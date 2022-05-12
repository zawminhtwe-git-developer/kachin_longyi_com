@extends('blog-layouts.app')
@section('head')
    <style>

        /*welcome css start*/
        @import url('https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@200;400;600;900&display=swap');

        :root {
            --body-color: #b700bc;
            --nav-color: #ed35ef;
            --nav-color-dark:#b700bc;
            --side-nav: #535353;
            --text-color: #fff;
            --search-bar: #f2f2f2;
            --search-text: #010718;
        }

        * {
            font-family: 'Source Serif 4', sans-serif;
            margin: 0;
            padding: 0;
        //box-shadow: border-box;
        }

        body {
            height: 100vh;
            background-color: var(--body-color);
        }

        body.dark {
            --body-color: #18191a;
            --nav-color: #242526;
            --side-nav: #242526;
            --text-color: #ccc;
            --search-bar: #242526;
            --search-text:#010718;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 70px;
            width: 100%;
            background-color: var(--nav-color);
            z-index: 100;
        }

        nav .nav-bar {
            position: relative;
            height: 100%;
            max-width: 1000px;
            width: 100%;
            background-color: var(--nav-color);
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .nav-bar .sideBarOpen {
            color: var(--text-color);
            font-size: 25px;
            padding: 5px;
            cursor: pointer;
            display: none;
            margin-left: -26px;
        }

        nav .nav-bar .logo a {
            font-size: 25px;
            font-weight: 500;
            color: var(--text-color);
            text-decoration: none;
        }

        .nav-bar .nav-links {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .nav-bar .nav-links li {
            margin: 0 5px;
            list-style: none;
        }

        .nav-links li a {
            position: relative;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            color: var(--text-color);
            padding: 10px;
        }

        .nav-links li a::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(50%);
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background-color: var(--text-color);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .nav-links li:hover a::before {
            opacity: 1;
        }
        .nav-links li a.nocolor::before {
            opacity: 0;
        }
        .nav-links li a.nocolor:hover::before {
            opacity: 1;
        }
        .nav-links li a.nocolor:hover{
            width: 50%;
            margin-left: 45px;
            justify-content: center;
            margin-right:45px;
            transition: all 0.5s ease-in;
        }
        .nav-bar .darkLight-searchBox {
            display: flex;
            align-items: center;

        }

        .darkLight-searchBox .dark-light,
        .darkLight-searchBox .searchToggle {
            height: 40px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--nav-color);
            margin: 0 5px;

        }

        .dark-light i,
        .searchToggle i {
            position: absolute;
            color: var(--text-color);
            font-size: 22px;
            cursor: pointer;
            transition: all 0.3s ease-in;
        }

        .dark-light i.sun {
            opacity: 0;
            pointer-events: none;
        }

        .dark-light.active i.sun {
            opacity: 1;
            pointer-events: auto;
        }

        .dark-light.active i.moon {
            opacity: 0;
            pointer-events: none;
        }

        .searchToggle i.cancel {
            opacity: 0;
            pointer-events: none;
        }

        .searchToggle.active i.cancel {
            opacity: 1;
            pointer-events: auto;
        }

        .searchToggle.active i.search {
            opacity: 0;
            pointer-events: none;
        }

        .searchBox {
            position: relative;
        }

        .searchBox .search-field {
            position: absolute;
            bottom: -85px;
            right: 5px;
            height: 50px;
            width: 300px;
            display: flex;
            align-items: center;
            background-color: var(--nav-color);
            padding: 3px;
            border-radius: 6px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease-in;
        }

        .searchToggle.active ~ .search-field {
            bottom: -74px;
            opacity: 1;
            pointer-events: auto;
        }


        .search-field::before {
            content: '';
            position: absolute;
            right: 14px;
            top: -4px;
            height: 12px;
            width: 12px;
            background-color: var(--nav-color);
            transform: rotate(-45deg);
            z-index: -1;
        }

        .search-field input {
            height: 100%;
            width: 100%;
            padding: 0 45px 0 15px;
            outline: none;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 400;
            color: var(--search-text);
            background-color: var(--search-bar);

        }

        body.dark .search-field input {
            color: var(--text-color);
        }

        .search-field i {
            position: absolute;
            color: var(--nav-color);
            right: 15px;
            font-size: 22px;
            cursor: pointer;
        }

        .menu .logo-toggle {
            display: none;
        }

        body.dark .search-field i {
            color: var(--text-color);
        }

        .dropdown-content a{
            color: var(--nav-color);
        }

        @media(max-width: 790px) {
            nav .nav-bar .sideBarOpen {
                display: block;
            }
            .menu {
                position: fixed;
                height: 100%;
                width: 320px;
                left: -100%;
                top: 0;
                padding: 20px;
                background-color: var(--nav-color);
                z-index: 100;
                transition: all 0.4s ease;

            }
            nav.active .menu {
                left: -0%;
            }
            nav.active .nav-bar .navLogo a {
                opacity: 0;
                transition: all 0.3s ease-in;

            }
            .menu .logo-toggle {
                display: block;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .logo-toggle .sideBarClose {
                color: var(--text-color);
                font-size: 24px;
                cursor: pointer;
                border: white solid;
            }
            .nav-bar .nav-links {
                flex-direction: column;
                padding-top: 30px;
            }
            .nav-links li a {
                display: block;
                margin-top: 20px;
            }
        }

        /*//welcome css stop*/

        /*//drop down css start*/


          li a, .dropbtn {
              display: inline-block;
              color: white;
              text-align: center;
              /*padding: 14px 16px;*/
              text-decoration: none;
          }

        li a:hover, .dropdown:hover .dropbtn {
            background-color:  var(--nav-color);
            border-radius: 50%;
            text-align: center;

        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color:var( --nav-color);
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: var(--nav-color);}

        .dropdown:hover .dropdown-content {
            display: block;
        }
        /*//drop down css stop*/

    </style>
    @endsection
@section('content')
    <div class="row">
        <div class="col-4">
           <div class="card bg-primary">
               <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
               </div>
               <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                   <input class="form-control">
               </div>
               <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
               </div>
           </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <i class="fas fa-book-open" style="color:var(--text-color)">Create Category</i>
                </div>
                <div class="card-body">
                    <lable class="form-label text-white">Category</lable>
                    <input class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary text-white">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection