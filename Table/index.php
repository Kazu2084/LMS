<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script src="body.js"></script>


<!-- CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky; top:0; z-index:1">
        <div class="app-header">
          <div class="app-header-left">
            <!-- <span class="app-icon"></span> -->

            <div class="p app-icon" id="aside-toggle-btn">              
            </div>
            <p class="app-name">Portfolio</p>
            <div class="search-wrapper">
              <input class="search-input" type="text" placeholder="Search">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
                <defs></defs>
                <circle cx="11" cy="11" r="8"></circle>
                <path d="M21 21l-4.35-4.35"></path>
              </svg>
            </div>
          </div>
          <div class="app-header-right">
            <button class="mode-switch" title="Switch Theme">
              <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
              </svg>
            </button>
            <button class="add-btn" title="Add New Project">
              <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" /></svg>
            </button>
            <button class="notification-btn">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
            </button>
            <button class="profile-btn">
              <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" />
              <span>Aybüke C.</span>
            </button>
          </div>
          <button class="messages-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
              <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" /></svg>
          </button>
        </div>
      </div>
     <div style="padding-top: 1rem;width: 100%;float:right">
  
            <!-- === wrapper section === -->
    <section id="wrapper" class="d-flex w-100">
        <!-- aside nav-->
        <aside class="border-right shadow-sm background text" id="aside-nav">
          <div id="side-nav">
            <!-- aside logo brand -->
           
            <!-- /aside logo brand -->

            <!-- aside nav ul list -->
            <ul class="nav flex-column" id="aside-nav-ul">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/CMS/Dashboard/index.php#">
                        <!-- svg -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-sliders align-middle">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                        <!-- /svg -->
                        <span style="font-size: 18px;" class="ms-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-calendar-check" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Manage Exam</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-calendar-minus" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Manage Examinee</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-file-alt" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Ranking</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-comment-alt" style="font-size: 19px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Report</span>
                        <span class="aside-badge ms-2">40</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-comment-alt" style="font-size: 19px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Feedback</span>
                        <span class="aside-badge ms-2">40</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <!-- <i class="far fa-sign-out-alt" style="font-size: 16px;"></i> -->
                        <i class="fas fa-sign-out-alt" style="font-size: 16px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Logout</span>
                    </a>
                </li>
            </ul>
            <!-- /aside nav ul list -->
</div>
        </aside>
        <!-- /aside nav-->

        <!-- === main === -->
        <main class="w-100 d-flex flex-column" id="main">
            <!-- === header === -->
           
            <!-- === /header === -->

            <!-- === main body section start === -->

            <section class="container-fluid"></section>
                <div class="app-content">
                    <div class="app-content-header">
                      <h1 class="app-content-headerText">Products</h1>
                     
                      <button class="app-content-headerButton">Add Product</button>
                    </div>
                    <div class="app-content-actions">
                      <!-- <input class="search-bar" placeholder="Search..." type="text"> -->
                      <div class="app-content-actions-wrapper">
                        <div class="filter-button-wrapper">
                          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
                          <div class="filter-menu">
                            <label>Category</label>
                            <select>
                              <option>All Categories</option>
                              <option>Furniture</option>                     <option>Decoration</option>
                              <option>Kitchen</option>
                              <option>Bathroom</option>
                            </select>
                            <label>Status</label>
                            <select>
                              <option>All Status</option>
                              <option>Active</option>
                              <option>Disabled</option>
                            </select>
                            <div class="filter-menu-buttons">
                              <button class="filter-button reset">
                                Reset
                              </button>
                              <button class="filter-button apply">
                                Apply
                              </button>
                            </div>
                          </div>
                        </div>
                        <button class="action-button list active" title="List View">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                        </button>
                        <button class="action-button grid" title="Grid View">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        </button>
                      </div>
                    </div>
                    <div class="products-area-wrapper tableView">
                      <div class="products-header">
                        <div class="product-cell image">
                          Items
                          <button class="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                          </button>
                        </div>
                        <div class="product-cell category">Category<button class="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                          </button></div>
                        <div class="product-cell status-cell">Status<button class="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                          </button></div>
                        <div class="product-cell sales">Sales<button class="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                          </button></div>
                        <div class="product-cell stock">Stock<button class="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                          </button></div>
                        <div class="product-cell price">Price<button class="sort-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                          </button></div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="product">
                            <span>Ocean</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>11</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>36</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$560</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8a2l0Y2hlbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Lou</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Kitchen</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status disabled">Disabled</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>6</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$710</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Yellow</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>61</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>56</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$360</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YmVkcm9vbXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Dreamy</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Bedroom</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status disabled">Disabled</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>41</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>66</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$260</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Boheme</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1507652313519-d4e9174996dd?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Sky</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Bathroom</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status disabled">Disabled</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>22</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>44</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$160</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Midnight</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>23</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>45</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$340</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Boheme</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1511389026070-a14ae610a1be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzR8fGludGVyaW9yfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Palm</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>24</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$60</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1600494603989-9650cf6ddd3d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTV8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Forest</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Living Room</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>41</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>16</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$270</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Njd8fGludGVyaW9yfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Sand</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Living Room</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status disabled">Disabled</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>52</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>16</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$230</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1533779283484-8ad4940aa3a8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODd8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Autumn</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>21</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$252</div>
                      </div>
                      <div class="products-row">
                        <button class="cell-more-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                        </button>
                          <div class="product-cell image">
                            <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                            <span>Boheme</span>
                          </div>
                        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                        <div class="product-cell status-cell">
                          <span class="cell-label">Status:</span>
                          <span class="status active">Active</span>
                        </div>
                        <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
                        <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
                        <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
                      </div>
                    </div>
                  </div>
            </section>

            <!-- === /main body section end === -->

            <!-- === footer === -->
            <footer id="footer" class="bg-dark py-3 text-white text-center shadow-sm mt-auto">
                <div>© All Rights Reserved</div>
            </footer>
            <!-- === /footer === -->

        </main>
        <!-- === /main === -->


    </section>
    <!-- === /wrapper section === -->
     </div> 
  </div>    
</body>
<!-- SCRIPT -->
<script src="table.js"></script>
</html>
