<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>

    <!-- NAV BAR -->
    <?php include 'header.php' ?>

    <!--HOME SECTION DESIGN-->

    <section class="home" id="home">
        <h2>Gym Management System</h2>
        <h4>Level Up Your Fitness — In a Smart Way</h4>
        <a href="#membership" class="mem-btn">Explore Plans</a>
    </section>

    <!--MEMBERSHIP SECTION DESING-->

    <section class="membership" id="membership">
        <header class="mem-header">
            <h2>Membership Plans</h2>
            <p>Choose the plan that fits your lifestyle</p>
        </header>
        <div class="plans">
            <div class="basic-plan">
                <h3>Basic</h3>
                <p class="price">৳1500/month</p>
                <ul>
                    <li>Gym Equipment Access</li>
                    <li>Locker Room Access</li>
                    <li>1 Free Fitness Assessment</li>
                </ul>
                <a href="#mem_reg" class="btn">Register</a>

            </div>

            <div class="premium-plan">
                <h3>Premium</h3>
                <p class="price">৳2500/month</p>
                <ul>
                    <li>All Basic Perks</li>
                    <li>Unlimited Fitness Classes</li>
                    <li>Personal Training</li>
                </ul>
                <a href="#mem_reg" class="btn">Register</a>

            </div>

            <div class="elite-plan">
                <h3>Elite</h3>
                <p class="price">৳3500/month</p>
                <ul>
                    <li>All Premium Perks</li>
                    <li>24/7 Access</li>
                    <li>Nutrition Consultation</li>
                </ul>
                <a href="#mem_reg" class="btn">Register</a>

            </div>
        </div>
    </section>

    <!--SEVICE SECTION DESIGN-->

    <section class="service-slider" id="service">
        <h2 class="service-heading">Our <span>Services</span></h2>

        <div class="slider-container">
            <div class="slide active">
                <div class="service-text">
                    <h3>Personal Training</h3>
                    <p>One-on-one customized workout sessions with certified trainers.</p>
                </div>
                <img src="perosnal.jpeg" alt="Personal Training">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Group Fitness Classes</h3>
                    <p>High-energy classes like Yoga, Zumba, HIIT, and Spin.</p>
                </div>
                <img src="group.jpeg" alt="Group Fitness Classes">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Strength Training</h3>
                    <p>Build muscle and increase power with guided weightlifting programs.</p>
                </div>
                <img src="strength.jpeg" alt="Strength Training">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Cardio Programs</h3>
                    <p>Fat-burning cardio workouts for endurance and weight loss.</p>
                </div>
                <img src="cardio.jpeg" alt="Cardio Programs">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Weight Lifting</h3>
                    <p>Build muscle and increase strength with expert-guided weight training programs.</p>
                </div>
                <img src="weight.jpeg" alt="Weight Lifting Programs">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Nutrition Consultation</h3>
                    <p> Personalized meal plans and dietary guidance to fuel your fitness journey.</p>
                </div>
                <img src="nutrition.jpeg" alt="Nutrition">
            </div>

            <div class="arrow left" id="prev">&#10094;</div>
            <div class="arrow right" id="next">&#10095;</div>
        </div>
    </section>

    <!--GALLARY SECTION-->

    <section class="gallery" id="gallery">
        <h2 class="opening">Gym Gallery</h2>
        <h3 class="second"><span>WHERE PROGRESS HAPPENS</span></h3>


        <div class="services-content">
            <div class="row">
                <img src="cardioPlace.jpeg" alt="">
                <h4>Cardio Area</h4>
            </div>
            <div class="row">
                <img src="strenghtPlace.jpeg" alt="">
                <h4>Strenght Training Area</h4>
            </div>
            <div class="row">
                <img src="zumba.jpeg" alt="">
                <h4>Zumba Zone</h4>
            </div>
            <div class="row">
                <img src="yoga.jpeg" alt="">
                <h4>Yoga Zone</h4>
            </div>
            <div class="row">
                <img src="locker.jpeg" alt="">
                <h4>Locker Room</h4>
            </div>
            <div class="row">
                <img src="steam.jpeg" alt="">
                <h4>Steam Bath</h4>
            </div>
        </div>
    </section>

    <!--TRAINER SECTION-->

    <section class="trainer" id="trainer">
        <header>
            <h1>Meet Our Trainers</h1>
        </header>
        <section class="trainer-section">
            <div class="trainer-card">
                <img src="omar.jpg" alt="Trainer 1">
                <h2>Omar Faruk Rakib</h2>
                <p>Muscle Building Expert</p>
            </div>
            <div class="trainer-card">
                <img src="ib.jpeg" alt="Trainer 2">
                <h2>Ibtesham Tanjim</h2>
                <p>Fat Loss Expert</p>
            </div>
            <div class="trainer-card">
                <img src="th.jpeg" alt="Trainer 3">
                <h2>Tauhid Islam</h2>
                <p>Strength Coach</p>
            </div>
            <div class="trainer-card">
                <img src="jh.jpeg" alt="Trainer 4">
                <h2>Jahed Islam</h2>
                <p>Zumba Specialist</p>
            </div>
        </section>
    </section>

    <!--blog-->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prime Fitness | Blog</title>
        <style>
            :root {
                --primary: #e63946;
                /* Red shade */
                --secondary: #1d3557;
                /* Dark navy blue */
                --light: #f1faee;
                /* Soft white */
                --text: #333;
                /* Dark gray */
                --text-light: #666;
                /* Light gray */
                --gray: #e9ecef;
                /* Pale gray */
            }


            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            body {
                background-color: #f8f9fa;
                color: var(--text);
                line-height: 1.6;
            }

            .container {
                width: 90%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 50px 0;
            }

            .section-title {
                text-align: center;
                margin-bottom: 50px;
            }

            .section-title h2 {
                font-size: 2.5rem;
                color: var(--secondary);
                margin-bottom: 15px;
            }

            .section-title p {
                color: var(--text-light);
                font-size: 1.1rem;
            }

            /* Blog Filter & Search */
            .blog-controls {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                flex-wrap: wrap;
                gap: 20px;
            }

            .blog-search {
                flex: 1;
                max-width: 400px;
                position: relative;
            }

            .blog-search input {
                width: 100%;
                padding: 12px 15px 12px 40px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 1rem;
            }

            .blog-search i {
                position: absolute;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--text-light);
            }

            .blog-categories {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }

            .category-btn {
                padding: 8px 16px;
                background: white;
                border: 1px solid #ddd;
                border-radius: 30px;
                cursor: pointer;
                transition: all 0.3s;
            }

            .category-btn.active,
            .category-btn:hover {
                background: var(--primary);
                color: white;
                border-color: var(--primary);
            }

            /* Blog Grid */
            .blog-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 30px;
                margin-bottom: 50px;
            }

            .blog-card {
                background: white;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s;
            }

            .blog-card:hover {
                transform: translateY(-5px);
            }

            .blog-image {
                height: 200px;
                overflow: hidden;
            }

            .blog-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s;
            }

            .blog-card:hover .blog-image img {
                transform: scale(1.05);
            }

            .blog-content {
                padding: 25px;
            }

            .blog-meta {
                display: flex;
                gap: 15px;
                margin-bottom: 15px;
                font-size: 0.9rem;
                color: var(--text-light);
            }

            .blog-category {
                background: var(--light);
                color: var(--secondary);
                padding: 4px 10px;
                border-radius: 4px;
                font-size: 0.8rem;
                font-weight: 600;
            }

            .blog-title {
                font-size: 1.3rem;
                margin-bottom: 15px;
                color: var(--secondary);
            }

            .blog-excerpt {
                color: var(--text-light);
                margin-bottom: 20px;
            }

            .read-more {
                display: inline-flex;
                align-items: center;
                color: var(--primary);
                font-weight: 600;
                text-decoration: none;
                transition: color 0.3s;
            }

            .read-more:hover {
                color: var(--secondary);
            }

            /* Pagination */
            .blog-pagination {
                display: flex;
                justify-content: center;
                gap: 10px;
            }

            .pagination-btn {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid #ddd;
                border-radius: 4px;
                background: white;
                cursor: pointer;
                transition: all 0.3s;
            }

            .pagination-btn.active,
            .pagination-btn:hover {
                background: var(--primary);
                color: white;
                border-color: var(--primary);
            }

            /* Newsletter */
            .blog-newsletter {
                background: var(--secondary);
                color: white;
                padding: 50px;
                border-radius: 8px;
                text-align: center;
                margin-top: 50px;
            }

            .newsletter-title {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }

            .newsletter-text {
                margin-bottom: 25px;
                opacity: 0.8;
            }

            .newsletter-form {
                display: flex;
                max-width: 500px;
                margin: 0 auto;
            }

            .newsletter-form input {
                flex: 1;
                padding: 12px 15px;
                border: none;
                border-radius: 4px 0 0 4px;
                font-size: 1rem;
            }

            .newsletter-form button {
                background: var(--primary);
                color: white;
                border: none;
                padding: 0 25px;
                border-radius: 0 4px 4px 0;
                cursor: pointer;
                font-weight: 600;
                transition: background 0.3s;
            }

            .newsletter-form button:hover {
                background: #c1121f;
            }

            /* No Results */
            .no-results {
                text-align: center;
                padding: 50px;
                grid-column: 1 / -1;
            }

            .no-results h3 {
                color: var(--text-light);
                margin-bottom: 15px;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .blog-controls {
                    flex-direction: column;
                    align-items: stretch;
                }

                .blog-search {
                    max-width: 100%;
                }

                .blog-categories {
                    justify-content: center;
                }

                .blog-grid {
                    grid-template-columns: 1fr;
                }

                .newsletter-form {
                    flex-direction: column;
                    gap: 10px;
                }

                .newsletter-form input,
                .newsletter-form button {
                    width: 100%;
                    border-radius: 4px;
                }
            }
        </style>
    </head>

    <body>
        <section class="blog" id="blog">
            <div class="container">
                <div class="section-title">
                    <h2>Fitness Blog</h2>
                    <p>Get the latest tips, advice, and inspiration for your fitness journey</p>
                </div>

                <div class="blog-controls">
                    <div class="blog-search">
                        <i>🔍</i>
                        <input type="text" id="searchInput" placeholder="Search articles...">
                    </div>
                    <div class="blog-categories" id="categoryFilters">
                        <button class="category-btn active" data-category="all">All Articles</button>
                        <button class="category-btn" data-category="nutrition">Nutrition</button>
                        <button class="category-btn" data-category="workouts">Workouts</button>
                        <button class="category-btn" data-category="motivation">Motivation</button>
                        <button class="category-btn" data-category="health">Health</button>
                    </div>
                </div>

                <div class="blog-grid" id="blogGrid">
                    <!-- Blog posts will be dynamically inserted here -->
                </div>

                <div class="blog-pagination" id="pagination">
                    <!-- Pagination buttons will be dynamically inserted here -->
                </div>

                <div class="blog-newsletter">
                    <h3 class="newsletter-title">Stay Updated</h3>
                    <p class="newsletter-text">Subscribe to our newsletter for the latest fitness tips and exclusive offers.</p>
                    <form class="newsletter-form" id="newsletterForm">
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>

        <script>
            // Sample blog data
            const blogPosts = [{
                    id: 1,
                    title: "10 Nutrition Tips for Muscle Gain",
                    excerpt: "Discover the essential nutrition strategies to maximize your muscle growth and recovery.",
                    category: "nutrition",
                    date: "2023-10-15",
                    readTime: "5 min read",
                    image: "nutrition.jpeg"
                },
                {
                    id: 2,
                    title: "The Ultimate Home Workout Routine",
                    excerpt: "No gym? No problem! Build an effective workout routine with minimal equipment.",
                    category: "workouts",
                    date: "2023-10-10",
                    readTime: "7 min read",
                    image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                },
                {
                    id: 3,
                    title: "Staying Motivated on Your Fitness Journey",
                    excerpt: "Learn how to maintain motivation and build lasting fitness habits.",
                    category: "motivation",
                    date: "2023-10-05",
                    readTime: "6 min read",
                    image: "https://images.unsplash.com/photo-1571019614244-c5d476efa0e6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                },
                {
                    id: 4,
                    title: "The Importance of Proper Hydration",
                    excerpt: "How staying hydrated impacts your performance and overall health.",
                    category: "health",
                    date: "2023-09-28",
                    readTime: "4 min read",
                    image: "https://images.unsplash.com/photo-1548839149-89c2e5d9aa6a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                },
                {
                    id: 5,
                    title: "Meal Prep for Busy Professionals",
                    excerpt: "Save time and eat healthy with these simple meal prep strategies.",
                    category: "nutrition",
                    date: "2023-09-22",
                    readTime: "8 min read",
                    image: "https://images.unsplash.com/photo-1505575967450-1833d8a61237?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                },
                {
                    id: 6,
                    title: "Building a Strong Core: Beyond Crunches",
                    excerpt: "Effective exercises to develop functional core strength.",
                    category: "workouts",
                    date: "2023-09-15",
                    readTime: "6 min read",
                    image: "https://images.unsplash.com/photo-1536922246289-88c42f957773?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                },
                {
                    id: 7,
                    title: "The Mental Benefits of Regular Exercise",
                    excerpt: "How physical activity improves mental health and cognitive function.",
                    category: "health",
                    date: "2023-09-10",
                    readTime: "5 min read",
                    image: "https://images.unsplash.com/photo-1552674605-db6ffd4facb5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                },
                {
                    id: 8,
                    title: "Setting Realistic Fitness Goals",
                    excerpt: "Learn how to set achievable goals that keep you motivated and on track.",
                    category: "motivation",
                    date: "2023-09-05",
                    readTime: "7 min read",
                    image: "https://images.unsplash.com/photo-1511988617509-a57c8a288659?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                }
            ];

            // DOM elements
            const blogGrid = document.getElementById('blogGrid');
            const categoryFilters = document.getElementById('categoryFilters');
            const searchInput = document.getElementById('searchInput');
            const pagination = document.getElementById('pagination');
            const newsletterForm = document.getElementById('newsletterForm');

            // Pagination settings
            const postsPerPage = 6;
            let currentPage = 1;
            let filteredPosts = [...blogPosts];

            // Format date
            function formatDate(dateString) {
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString(undefined, options);
            }

            // Display blog posts
            function displayBlogPosts(postsToShow, page = 1) {
                blogGrid.innerHTML = '';

                if (postsToShow.length === 0) {
                    blogGrid.innerHTML = `
                    <div class="no-results">
                        <h3>No articles found</h3>
                        <p>Try adjusting your search or filter criteria</p>
                    </div>
                `;
                    return;
                }

                // Calculate pagination
                const startIndex = (page - 1) * postsPerPage;
                const endIndex = startIndex + postsPerPage;
                const paginatedPosts = postsToShow.slice(startIndex, endIndex);

                // Generate blog post cards
                paginatedPosts.forEach(post => {
                    const blogCard = document.createElement('div');
                    blogCard.className = 'blog-card';
                    blogCard.innerHTML = `
                    <div class="blog-image">
                        <img src="${post.image}" alt="${post.title}">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-category">${post.category}</span>
                            <span>${formatDate(post.date)}</span>
                            <span>${post.readTime}</span>
                        </div>
                        <h3 class="blog-title">${post.title}</h3>
                        <p class="blog-excerpt">${post.excerpt}</p>
                       <a href="blog_details.php?id=${post.id}" class="read-more">Read More →</a>

                    </div>
                `;
                    blogGrid.appendChild(blogCard);
                });

                // Generate pagination
                generatePagination(postsToShow.length, page);
            }

            // Generate pagination buttons
            function generatePagination(totalPosts, currentPage) {
                const totalPages = Math.ceil(totalPosts / postsPerPage);
                pagination.innerHTML = '';

                // Previous button
                const prevButton = document.createElement('button');
                prevButton.className = 'pagination-btn';
                prevButton.innerHTML = '←';
                prevButton.disabled = currentPage === 1;
                prevButton.addEventListener('click', () => {
                    if (currentPage > 1) {
                        displayBlogPosts(filteredPosts, currentPage - 1);
                    }
                });
                pagination.appendChild(prevButton);

                // Page buttons
                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
                    pageButton.textContent = i;
                    pageButton.addEventListener('click', () => {
                        displayBlogPosts(filteredPosts, i);
                    });
                    pagination.appendChild(pageButton);
                }

                // Next button
                const nextButton = document.createElement('button');
                nextButton.className = 'pagination-btn';
                nextButton.innerHTML = '→';
                nextButton.disabled = currentPage === totalPages;
                nextButton.addEventListener('click', () => {
                    if (currentPage < totalPages) {
                        displayBlogPosts(filteredPosts, currentPage + 1);
                    }
                });
                pagination.appendChild(nextButton);
            }

            // Filter posts by category
            function filterPostsByCategory(category) {
                if (category === 'all') {
                    filteredPosts = [...blogPosts];
                } else {
                    filteredPosts = blogPosts.filter(post => post.category === category);
                }
                currentPage = 1;
                displayBlogPosts(filteredPosts, currentPage);
            }

            // Search posts
            function searchPosts(query) {
                if (query.trim() === '') {
                    filteredPosts = [...blogPosts];
                } else {
                    const lowerCaseQuery = query.toLowerCase();
                    filteredPosts = blogPosts.filter(post =>
                        post.title.toLowerCase().includes(lowerCaseQuery) ||
                        post.excerpt.toLowerCase().includes(lowerCaseQuery) ||
                        post.category.toLowerCase().includes(lowerCaseQuery)
                    );
                }
                currentPage = 1;
                displayBlogPosts(filteredPosts, currentPage);
            }

            // Event listeners
            categoryFilters.addEventListener('click', (e) => {
                if (e.target.classList.contains('category-btn')) {
                    // Update active button
                    document.querySelectorAll('.category-btn').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    e.target.classList.add('active');

                    // Filter posts
                    const category = e.target.dataset.category;
                    filterPostsByCategory(category);
                }
            });

            searchInput.addEventListener('input', (e) => {
                searchPosts(e.target.value);
            });

            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const email = e.target.querySelector('input[type="email"]').value;
                alert(`Thank you for subscribing with ${email}! You'll receive our latest updates soon.`);
                e.target.reset();
            });

            // Initialize blog
            displayBlogPosts(blogPosts, currentPage);
        </script>
    </body>

    </html>

    <!--contact section-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us | Prime Fitness</title>

        <style>
            body {
                margin: 0;
                padding: 0;
                background: black;
                color: whitesmoke;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .contact {
                padding: 80px 0;
            }

            .section-title {
                text-align: center;
                margin-bottom: 60px;
            }

            .section-title h2 {
                font-size: 2.7rem;
                font-weight: 800;
                background: linear-gradient(#c7d0ce, #5fb94d);
                -webkit-background-clip: text;
                color: transparent;
            }

            .section-title p {
                color: #c2c2c2;
                font-size: 1.1rem;
            }

            .container {
                max-width: 1100px;
                margin: auto;
                padding: 10px;
            }

            .contact-container {
                display: flex;
                gap: 40px;
                flex-wrap: wrap;
            }

            /* CONTACT INFO */
            .contact-info {
                flex: 1;
                min-width: 300px;
            }

            .contact-info h3 {
                font-size: 1.9rem;
                margin-bottom: 20px;
            }

            .contact-info>p {
                margin-bottom: 30px;
                color: #bdbdbd;
            }

            .contact-item {
                display: flex;
                align-items: center;
                padding: 15px;
                border-left: 3px solid #5fb94d;
                margin-bottom: 20px;
                transition: 0.3s ease;
            }

            .contact-item:hover {
                background: rgba(95, 185, 77, 0.1);
                transform: translateX(5px);
            }

            .contact-item i {
                font-size: 1.8rem;
                color: #5fb94d;
                margin-right: 15px;
            }

            .contact-item-content h4 {
                margin: 0;
                font-weight: 600;
            }

            .contact-item-content p {
                margin: 4px 0 0;
                color: #ccc;
            }

            /* CONTACT FORM */
            .contact-form {
                flex: 1;
                min-width: 300px;
                background: rgba(255, 255, 255, 0.05);
                padding: 40px;
                border-radius: 10px;
                border: 1px solid rgba(95, 185, 77, 0.4);
                backdrop-filter: blur(4px);
                box-shadow: 0 0 15px rgba(95, 185, 77, 0.2);
            }

            .form-group {
                margin-bottom: 25px;
            }

            label {
                display: block;
                margin-bottom: 6px;
                font-size: 1rem;
                font-weight: 500;
            }

            .form-control {
                width: 100%;
                padding: 12px 16px;
                border-radius: 6px;
                border: 1px solid #5fb94d;
                background: black;
                color: white;
                font-size: 1rem;
                transition: 0.3s ease;
            }

            .form-control:focus {
                outline: none;
                box-shadow: 0 0 10px rgba(95, 185, 77, 0.7);
            }

            textarea.form-control {
                min-height: 150px;
            }

            .btn {
                width: 100%;
                background: black;
                color: whitesmoke;
                border: 2px groove #5fb94d;
                padding: 14px;
                font-size: 1.1rem;
                border-radius: 6px;
                cursor: pointer;
                transition: 0.3s;
            }

            .btn:hover {
                background: #5fb94d;
                color: black;
                font-weight: 700;
                box-shadow: 0 0 20px #5fb94d;
                transform: translateY(-2px);
            }

            @media (max-width: 768px) {
                .contact-container {
                    flex-direction: column;
                }
            }
        </style>
    </head>

    <body>
        <section class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact Us</h2>
                    <p>Reach out to start your fitness transformation</p>
                </div>

                <div class="contact-container">
                    <!-- LEFT SIDE INFO -->
                    <div class="contact-info">
                        <h3>Get In Touch</h3>
                        <p>We are here to help you with your fitness goals. Contact us today!</p>

                        <div class="contact-item">
                            <i>📍</i>
                            <div class="contact-item-content">
                                <h4>Address</h4>
                                <p>123 Fitness Street, Dhaka</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <i>📞</i>
                            <div class="contact-item-content">
                                <h4>Phone</h4>
                                <p>+880 1700-000000</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <i>✉️</i>
                            <div class="contact-item-content">
                                <h4>Email</h4>
                                <p>primefitness@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT FORM -->
                    <div class="contact-form">
                        <form id="contactForm">

                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Your Email</label>
                                <input type="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" id="subject" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Your Message</label>
                                <textarea id="message" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn">Send Message</button>

                        </form>
                    </div>
                </div>

            </div>
        </section>

        <script>
            const form = document.getElementById("contactForm");

            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const name = document.getElementById("name").value;
                alert(`Thank you, ${name}! Your message has been sent.`);
                form.reset();
            });
        </script>
    </body>

    </html>

    <!--Member Registration Section-->
    <section class="form" id="mem_reg">
        <div class="mem_form">
            <h2><u>Member Registration!</u></h2>

            <!-- Show session messages -->
            <?php
            if (isset($_SESSION['register_error'])) {
                echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['register_error'] . "</p>";
                unset($_SESSION['register_error']); // clear message after showing
            }
            if (isset($_SESSION['register_success'])) {
                echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['register_success'] . "</p>";
                unset($_SESSION['register_success']);
            }

            ?>
            <br>
            <form action="member_control.php" method="post">
                <label>NAME: </label>
                <input type="text" name="Name" placeholder="Enter Your Full Name" required><br>
                <label>AGE: </label>
                <input type="number" name="Age" placeholder="Enter Your Age" required><br>
                <label>Contact: </label>
                <input type="number" name="Contact" placeholder="Enter Your Contact Number" required><br>
                <label>EMAIL: </label>
                <input type="email" name="Email" placeholder=" Enter Your Email" required><br>
                <label>ADDRESS</label>
                <input type="text" name="Address" placeholder="Enter your Adress" required><br>
                <label>GENDER: </label>
                <div class="gender">
                    <input type="radio" value="male" name="Gender"><label for="male">MALE</label>
                    <input type="radio" value="female" name="Gender"><label for="female">FEMALE</label>
                </div>
                <br>
                <label>PASSWORD: </label>
                <input type="password" name="Password" placeholder="Enter Password" required><br>
                <select name="Role" placeholder="Select Your Role" required>
                    <option value="">--Select Role--</option>
                    <option value="Member">Member</option>
                </select><br><br>
                <button type="submit" name="register">Register</button>
            </form>
            <br>
            <p align="center">Already have Account? <a href="member_login.php"><u><b> <big>login</big></b></u> </a>here!</p>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php' ?>

    <!-- SERVICES SLIDE-SHOW -->
    <script>
        const slides = document.querySelectorAll(".slide");
        const prev = document.getElementById("prev");
        const next = document.getElementById("next");
        let index = 0;

        function showSlide(n) {
            slides.forEach((slide, i) => {
                slide.classList.remove("active");
                if (i === n) slide.classList.add("active");
            });
        }

        function nextSlide() {
            index = (index + 1) % slides.length;
            showSlide(index);
        }

        function prevSlide() {
            index = (index - 1 + slides.length) % slides.length;
            showSlide(index);
        }

        next.addEventListener("click", nextSlide);
        prev.addEventListener("click", prevSlide);

        // Auto-slide every 5 seconds
        setInterval(nextSlide, 5000);
    </script>


</body>

</html>