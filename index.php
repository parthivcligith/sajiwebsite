<?php
// Product data array - in a real implementation, this would come from a database
$products = [
    1 => [
        'name' => 'Swimming Pool Glass Mosaic Tiles',
        'category' => 'Pool Tiles',
        'category_slug' => 'tiles',
        'short_description' => 'Manufacturer of premium glass mosaic tiles for swimming pools.',
        'long_description' => 'We manufacture and supply top-quality swimming pool glass mosaic tiles designed for aesthetic appeal and durability. Ideal for both residential and commercial pools, our tiles resist pool chemicals and maintain vibrant color.',
        'features' => [
            'Premium glass construction',
            'Resistant to pool chemicals and UV exposure',
            'Non-slip surface options available',
            'Wide variety of colors and designs',
            'Easy installation and maintenance'
        ],
        'images' => [
            'images\glasstile.jpg',
            'images\glasstile.jpg',
            'images\glasstile.jpg'
        ],
        'related_products' => [2, 3, 4]
    ],
    2 => [
        'name' => 'Vinyl Pool Liners',
        'category' => 'Pool Liners',
        'category_slug' => 'liners',
        'short_description' => 'Durable vinyl liners that fit perfectly between water and pool structure.',
        'long_description' => 'Our vinyl pool liners act as a protective layer between the water and the pool structure. Custom-manufactured for a perfect fit, they lock into the track at deck level and provide a smooth, durable, and chemical-resistant surface.',
        'features' => [
            'Heavy-duty vinyl material',
            'Custom-made for perfect fit',
            'Locks securely into pool track',
            'Resistant to fading and tearing',
            'Smooth and comfortable surface'
        ],
        'images' => [
            'images\poolliner.jpg',
            'images\poolliner.jpg',
            'images\poolliner.jpg'
        ],
        'related_products' => [1, 3, 4]
    ],
    3 => [
        'name' => 'Sand Pool Filters',
        'category' => 'Pool Filters',
        'category_slug' => 'filters',
        'short_description' => 'Reliable sand filters designed for effective pool water cleaning.',
        'long_description' => 'Our sand pool filters use a thick bed of special-grade sand to trap debris and impurities. Made from durable materials like fiberglass or metal, these filters ensure crystal clear water with easy maintenance and long-lasting performance.',
        'features' => [
            'Thick special-grade sand bed',
            'Fiberglass or metal tank options',
            'Effective debris and dirt filtration',
            'Pressure gauge and multi-port valve included',
            'Easy backwashing and maintenance'
        ],
        'images' => [
            'images\filter.jpg',
            'images\filter.jpg',
            'images\filter.jpg'
        ],
        'related_products' => [1, 2, 4]
    ],
    4 => [
        'name' => 'Readymade Swimming Pools',
        'category' => 'Readymade Pools',
        'category_slug' => 'pools',
        'short_description' => 'Prefabricated swimming pools including FRP pools, inflatable spa pools, and hydrotherapy pools.',
        'long_description' => 'We offer a range of readymade swimming pools such as FRP pools, inflatable spa pools, and hydrotherapy pools. Manufactured with high-quality materials, these pools are designed for quick installation, durability, and easy maintenance.',
        'features' => [
            'Prefabricated for fast installation',
            'Durable FRP and other material options',
            'Low maintenance requirements',
            'Various shapes and sizes available',
            'Suitable for residential and commercial use'
        ],
        'images' => [
            'images\readymade.jpg',
            'images\readymade.jpg',
            'images\readymade.jpg'
        ],
        'related_products' => [1, 2, 3]
    ]
];


// Get search query if exists
$search_query = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
$filter_category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : 'all';

// Filter products based on search and category
$filtered_products = [];
foreach ($products as $id => $product) {
    // Skip if category filter is active and doesn't match
    if ($filter_category !== 'all' && $product['category_slug'] !== $filter_category) {
        continue;
    }
    
    // Skip if search is active and doesn't match
    if (!empty($search_query) && 
        stripos($product['name'], $search_query) === false && 
        stripos($product['category'], $search_query) === false && 
        stripos($product['short_description'], $search_query) === false) {
        continue;
    }
    
    $filtered_products[$id] = $product;
}
?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Poolscapes India</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="styles.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">


</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.php">
                <img src="images/logop.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <h3>Navigation</h3>
                
                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                    <li><a class="smoothscroll"  href="#products" title="products">Products</a></li>
                    <li><a class="smoothscroll"  href="#services" title="services">Services</a></li>
                    <li><a class="smoothscroll"  href="#works" title="works">Works</a></li>
                    <li><a class="smoothscroll"  href="#clients" title="clients">Clients</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                </ul>
    
                <p>Crafting Your Perfect Poolside Paradise.<a href='#0'></a> Poolscapes India is a leading swimming pool construction and manufacturing company, offering custom pool design, construction, and installation services across India. </p>
    
                <ul class="header-nav__social">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul>

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text"></span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="images\hheerroo.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h3>Welcome to Poolscapes India</h3>

                <h1 style="font-family: 'Playfair Display', serif; font-weight:700; letter-spacing:1px; line-height:1.2;">
                    We are a creative group <br>
                    of people who design <br>
                    influential brands and <br>
                    digital experiences.
                </h1>
                
                

                <div class="home-content__buttons">
                    <a href="https://wa.me/919895706799" class="smoothscroll btn btn--stroke">
                        Start a Project
                    </a>
                    <a href="#about" class="smoothscroll btn btn--stroke">
                        More About Us
                    </a>
                </div>

            </div>

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    <span>Scroll Down</span>
                </a>
            </div>

            <div class="home-content__line"></div>

        </div> <!-- end home-content -->


        <ul class="home-social">
            <li>
                <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="#0"><i class="fa fa-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="#0"><i class="fa fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
            </li>
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->


<!-- about
================================================== -->
<!-- about
================================================== -->
<section id='about' class="s-about" style="position: relative; overflow: hidden; height: 100vh; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">

    <!-- Dark Overlay -->
    <div class="carousel-overlay"></div>

    <!-- Main Content (no home-content wrapper) -->
    <div style="flex: 1; padding-right: 2rem; min-width: 300px;">

        <div class="row section-header has-bottom-sep" data-aos="fade-up" style="position: relative; z-index: 2;">
            <div class="col-full">
                <h3 class="subhead subhead--dark" style="font-family: 'Playfair Display', serif; font-weight:500;">
                    Hello There
                </h3>

                <h1 class="display-1 display-1--light" style="font-family: 'Playfair Display', serif; font-weight:700; letter-spacing:1px; line-height:1.2;">
                    We Are Poolscapes India
                </h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up" style="position: relative; z-index: 2;">
            <div class="col-full">
                <p>
                    Poolscapes India is a leading swimming pool construction and manufacturing company, offering custom-designed pools and complete pool solutions across India and internationally. We specialize in pool tiles, liners, filters, and readymade swimming pools for fast, high-quality installations.

                    With a strong presence in Kerala and a growing global footprint, we deliver expert craftsmanship, durable materials, and innovative designs for residential, commercial, and hospitality projects. 
                </p>
            </div>
        </div>

        <div class="about__line" style="position: relative; z-index: 2;"></div>

    </div> <!-- end main content -->

    <!-- Image Section (only for desktop) -->
    <div class="about-image desktop-only" style="flex: 1; display: flex; align-items: center; justify-content: center; position: relative; z-index: 2; padding-right: 3rem; min-width: 300px;">
        <img src="images/lp1.jpg" alt="Poolscapes Project" style="max-width: 50%; height: auto; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
    </div>

</section> <!-- end s-about -->

<!-- Products Showcase Section
================================================== -->
<section id="products" class="s-products" style="background-color: #f8f9fa; padding: 100px 0;">
    <div class="container">
        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead" style="font-family: 'Playfair Display', serif; font-weight:500; color: #000;">
                    Our Products
                </h3>
                <h1 class="display-2" style="font-family: 'Playfair Display', serif; font-weight:700; letter-spacing:1px; line-height:1.2; color: #000;">
                    Premium Pool Products
                </h1>
                <div class="gold-divider mx-auto my-3" style="height: 3px; width: 80px; background: #d4af37; position: relative; margin: 20px 0;"></div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-md-8 col-lg-6 mx-auto">
                <form action="index.php#products" method="GET" class="product-search-form">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search products..." value="<?php echo htmlspecialchars($search_query ?? ''); ?>" aria-label="Search products">
                        <button class="btn btn-gold" type="submit" style="background-color: #d4af37; color: #000; border-color: #d4af37;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <!-- Hidden anchor for scrolling to products section -->
                    <input type="hidden" name="section" value="products">
                </form>


                
                <div id="filter-status" class="text-center mt-3">
                    <span>Showing all products</span>
                </div>
            </div>
        </div>

        <style>
            .filter-container {
                margin: 30px auto;
                background-color: #fff;
                border-radius: 10px;
                padding: 15px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            }
            
            .filter-label {
                text-align: center;
                margin-bottom: 12px;
                font-weight: 500;
                color: #555;
                font-size: 16px;
            }
            
            .product-filters {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 10px;
                max-width: 100%;
            }

            .product-filters .filter-btn {
                padding: 10px 20px;
                border: none;
                background-color: #f0f0f0;
                color: #333;
                font-family: inherit;
                font-size: 14px;
                cursor: pointer;
                border-radius: 30px;
                transition: all 0.3s ease;
                font-weight: 500;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                position: relative;
                overflow: hidden;
            }

            .product-filters .filter-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: 0.5s;
            }

            .product-filters .filter-btn:hover::before {
                left: 100%;
            }

            .product-filters .filter-btn.active,
            .product-filters .filter-btn:hover {
                background-color: #d4af37;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
            }

            #filter-status {
                font-size: 14px;
                color: #777;
                font-style: italic;
                margin-top: 10px;
                transition: all 0.3s ease;
            }

            @media (max-width: 768px) {
                .product-filters {
                    flex-direction: row;
                    flex-wrap: wrap;
                    justify-content: center;
                }
                .product-filters .filter-btn {
                    width: calc(50% - 10px);
                    margin-bottom: 10px;
                    font-size: 13px;
                    padding: 8px 12px;
                }
                .filter-container {
                    padding: 12px 10px;
                }
            }

            @media (max-width: 480px) {
                .product-filters .filter-btn {
                    width: 100%;
                }
            }

            .product-item {
                border: 1px solid transparent;
                padding: 0;
                margin: 0;
                transition: opacity 0.4s ease, transform 0.4s ease;
            }
            
            .product-card {
                background-color: #fff;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                height: 100%;
                transition: all 0.4s ease;
            }
            
            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }
            
            .product-image {
                position: relative;
                overflow: hidden;
                height: 250px;
            }
            
            .product-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.8s ease;
            }
            
            .product-card:hover .product-image img {
                transform: scale(1.05);
            }
            
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7);
                display: flex;
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.4s ease;
            }
            
            .product-card:hover .overlay {
                opacity: 1;
            }
            
            .overlay a {
                border: 2px solid #fff;
                color: #fff;
                padding: 10px 20px;
                font-weight: 500;
                transform: translateY(20px);
                transition: all 0.4s ease;
                text-decoration: none;
                background-color: transparent;
            }
            
            .product-card:hover .overlay a {
                transform: translateY(0);
            }
            
            .overlay a:hover {
                background-color: #d4af37;
                border-color: #d4af37;
                color: #000;
            }
            
            .product-info {
                padding: 20px;
                background: linear-gradient(to bottom, #fff 0%, #f8f9fa 100%);
            }
            
            .product-info h3 {
                color: #000;
                font-size: 1.25rem;
                margin-bottom: 10px;
                font-weight: 600;
                position: relative;
                padding-bottom: 10px;
                font-family: 'Playfair Display', serif;
            }
            
            .product-info h3::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 40px;
                height: 2px;
                background-color: #d4af37;
            }
            
            .product-info p {
                color: #343a40;
                font-size: 0.9rem;
                margin-bottom: 10px;
                line-height: 1.5;
            }
            
            .price-request {
                color: #d4af37;
                font-weight: 600;
                font-style: italic;
                margin-top: 10px;
                display: inline-block;
                position: relative;
            }
            
            .price-request::after {
                content: '';
                position: absolute;
                bottom: -3px;
                left: 0;
                width: 100%;
                height: 1px;
                background-color: #d4af37;
                transform: scaleX(0);
                transform-origin: right;
                transition: transform 0.3s ease;
            }
            
            .product-card:hover .price-request::after {
                transform: scaleX(1);
                transform-origin: left;
            }
            
            /* Animation for filtering */
            .product-item.fade-out {
                opacity: 0;
                transform: scale(0.95);
            }
            
            .product-item.fade-in {
                opacity: 1;
                transform: scale(1);
            }
            
            /* No products found styling */
            .alert-info {
                background-color: #f8f9fa;
                border: 1px solid #e9ecef;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            }
            
            .alert-info h4 {
                color: #000;
                font-family: 'Playfair Display', serif;
                margin-bottom: 15px;
            }
            
            .alert-info p {
                color: #6c757d;
                margin-bottom: 20px;
            }
            @media (min-width: 1200px) {
                #products-container {
                    flex-wrap: nowrap !important;
                }
                .product-item {
                    flex: 0 0 auto;
                    width: 25%;
                    max-width: 25%;
                }
            }

            .product-info h3 {
                font-size: 1.5rem; /* bigger title */
            }

            .product-info p {
                font-size: 1rem; /* bigger description */
            }

            .price-request {
                font-size: 1.1rem; /* bigger price */
            }

        </style>

        <!-- Products Grid -->
        <div class="row g-4 flex-nowrap justify-content-start" id="products-container" style="overflow-x:auto;">

        <?php foreach ($filtered_products as $id => $product): ?>
            <div class="col-3 product-item" data-category="<?php echo strtolower(htmlspecialchars($product['category'])); ?>" style="min-width:300px;" data-aos="fade-up" data-aos-delay="<?php echo ($id % 3) * 100; ?>">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['images'][0]); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid">
                        <div class="overlay">
                            <a href="product-details.php?id=<?php echo $id; ?>" class="btn btn-outline-light">View Details</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 style="font-size: 1.5rem;"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p style="font-size: 1rem;"><?php echo htmlspecialchars($product['short_description']); ?></p>
                        <div class="price-request" style="font-size: 1.1rem;">Price on Request</div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productItems = document.querySelectorAll('.product-item');
    const filterStatus = document.getElementById('filter-status');
    const productsContainer = document.getElementById('products-container');
    
    // Category name mapping for display
    const categoryNames = {
        'all': 'all products',
        'tiles': 'Pool Tiles',
        'filters': 'Pool Filters',
        'readymade': 'Readymade Pools',
        'liners': 'Pool Liners'
    };
    
    // Function to update filter status text
    function updateFilterStatus(category, count) {
        filterStatus.innerHTML = `<span>Showing ${count} ${categoryNames[category]}${count !== 1 ? '' : ''}</span>`;
        
        // Animate the status text
        filterStatus.style.opacity = '0';
        setTimeout(() => {
            filterStatus.style.opacity = '1';
        }, 300);
    }
    
    // Function to filter products with animation
    function filterProducts(category) {
    let visibleCount = 0;

    productItems.forEach(item => {
        item.classList.add('fade-out');
    });

    setTimeout(() => {
        productItems.forEach(item => {
            const itemCategory = item.dataset.category.toLowerCase();
            const filterCategory = category.toLowerCase();

            if (filterCategory === 'all' || itemCategory === filterCategory) {
                item.style.display = 'block';
                item.classList.remove('fade-out');
                item.classList.add('fade-in');
                visibleCount++;
            } else {
                item.style.display = 'none';
                item.classList.remove('fade-in');
            }
        });

        updateFilterStatus(category, visibleCount);

        setTimeout(() => {
            productItems.forEach(item => {
                item.classList.remove('fade-in');
            });
        }, 500);
    }, 300);
}

    
    // Add click event to filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the category from data attribute
            const category = this.dataset.category;
            
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter the products
            filterProducts(category);
            
            // Scroll to products container if needed (on mobile)
            if (window.innerWidth < 768) {
                const yOffset = -20; 
                const y = productsContainer.getBoundingClientRect().top + window.pageYOffset + yOffset;
                window.scrollTo({top: y, behavior: 'smooth'});
            }
        });
    });
    
    // Initialize with "All Products" selected
    const initialCategory = 'all';
    let initialCount = 0;
    
    productItems.forEach(item => {
        if (item.style.display !== 'none') {
            initialCount++;
        }
    });
    
    updateFilterStatus(initialCategory, initialCount);
});
</script>


<section id='services' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead" style="font-family: 'Playfair Display', serif; font-weight:500;">
                    What We Do
                </h3>
                <h1 class="display-2" style="font-family: 'Playfair Display', serif; font-weight:700; letter-spacing:1px; line-height:1.2;">
                    We provide complete solutions to design, build, and maintain stunning swimming pools.
                </h1>
            </div>
        </div>
         <!-- end section-header -->
    
         <div class="row services-list block-1-2 block-tab-full">

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    
                </div>
                <div class="service-text">
                    <h3 class="h2" style="font-family: 'Playfair Display', serif; font-weight:600;color: #c9b954;">
                        Custom Pool Design
                    </h3>
                    <p>We create bespoke swimming pool designs that are tailored to your space, style, and functional needs. Whether it's a residential pool or a large-scale commercial project, our designs blend beauty with precision engineering.</p>
                </div>
            </div>
        
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    
                </div>
                <div class="service-text">
                    <h3 class="h2" style="font-family: 'Playfair Display', serif; font-weight:600;color: #c9b954;">
                        Swimming Pool Construction
                    </h3>
                    <p>Our expert team ensures flawless execution of your pool build, using high-grade materials and the latest construction techniques to deliver pools that are durable, safe, and visually stunning.</p>
                </div>
            </div>
        
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    
                </div>
                <div class="service-text">
                    <h3 class="h2" style="font-family: 'Playfair Display', serif; font-weight:600;color: #c9b954;">
                        Readymade Pools
                    </h3>
                    <p>For faster installations, we offer a range of high-quality readymade swimming pools that are pre-engineered for quick setup, ensuring minimal disruption with maximum results.</p>
                </div>
            </div>
        
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    
                </div>
                <div class="service-text">
                    <h3 class="h2" style="font-family: 'Playfair Display', serif; font-weight:600;color: #c9b954;">
                        Pool Tiles & Finishes
                    </h3>
                    <p>We supply premium pool tiles and liners in various styles and finishes to enhance the look and longevity of your pool. Our materials are built to withstand wear while adding a touch of elegance.</p>
                </div>
            </div>
        
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    
                </div>
                <div class="service-text">
                    <h3 class="h2" style="font-family: 'Playfair Display', serif; font-weight:600;color: #c9b954;">
                        Pool Filtration & Equipment
                    </h3>
                    <p>We provide advanced pool filters and equipment to keep your pool water clean, safe, and crystal clear. Our systems are designed for efficiency, ease of use, and long-term reliability.</p>
                </div>
            </div>
        
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    
                </div>
                <div class="service-text">
                    <h3 class="h2" style="font-family: 'Playfair Display', serif; font-weight:600;color: #c9b954;">
                        Pool Renovation & Maintenance
                    </h3>
                    <p>Extend the life of your pool with our renovation and maintenance services. From resurfacing and leak repairs to regular upkeep, we ensure your pool remains in perfect condition all year round.</p>
                </div>
            </div>
        
        </div> <!-- end services-list -->
        
    
    </section> <!-- end s-services -->

    <!-- works
    ================================================== -->
    <section id='works' class="s-works">

        <div class="intro-wrap">
                
            <div class="row section-header has-bottom-sep light-sep" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead" style="font-family: 'Playfair Display', serif; font-weight:500;">
                        Recent Works
                    </h3>
                    <h1 class="display-2 display-2--light" style="font-family: 'Playfair Display', serif; font-weight:700; letter-spacing:1px; line-height:1.2;">
                        We love what we do, check out some of our latest works
                    </h1>

                    <div class="gallery-container">
                        <div class="gallery-grid">
                            <!-- Item -->
                            <div class="gallery-item">
                                <a href="#">
                                    <img src="images/11.jpg" alt="Work 1">
                                    <div class="gallery-overlay">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="gallery-item">
                                <a href="#">
                                    <img src="images/12.jpg" alt="Work 2">
                                    <div class="gallery-overlay">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="gallery-item">
                                <a href="#">
                                    <img src="images/13.jpg" alt="Work 3">
                                    <div class="gallery-overlay">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="gallery-item">
                                <a href="#">
                                    <img src="images/14.jpg" alt="Work 4">
                                    <div class="gallery-overlay">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="gallery-item">
                                <a href="#">
                                    <img src="images/15.jpg" alt="Work 5">
                                    <div class="gallery-overlay">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                            <div class="gallery-item">
                                <a href="#">
                                    <img src="images/16.jpg" alt="Work 6">
                                    <div class="gallery-overlay">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    
                    <script>
                        document.querySelectorAll('a').forEach(link => {
                            link.addEventListener('mouseenter', () => {
                                const img = link.querySelector('img');
                                const caption = link.querySelector('div:nth-of-type(1)');
                                const overlay = link.querySelector('div:nth-of-type(2)');
                                img.style.transform = 'scale(1.2)';
                                caption.style.opacity = '1';
                                caption.style.transform = 'translate3d(0, 0, 0)';
                                overlay.style.transform = 'scale(2.5)';
                            });
                            link.addEventListener('mouseleave', () => {
                                const img = link.querySelector('img');
                                const caption = link.querySelector('div:nth-of-type(1)');
                                const overlay = link.querySelector('div:nth-of-type(2)');
                                img.style.transform = 'scale(1)';
                                caption.style.opacity = '0';
                                caption.style.transform = 'translate3d(0, 2rem, 0)';
                                overlay.style.transform = 'scale(0)';
                            });
                        });
                    </script>

                    <style>

                    .gallery-container {
                        width: 100%;
                        max-width: 1600px;
                        margin: 0 auto;
                        padding: 0 2rem;
                    }

                    .gallery-grid {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                        gap: 1rem;
                    }

                    .gallery-item {
                        position: relative;
                        overflow: hidden;
                        border-radius: 10px;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                    }

                    .gallery-item img {
                        width: 100%;
                        height: 100%;
                        display: block;
                        object-fit: cover;
                        transition: transform 0.8s ease;
                    }

                    .gallery-overlay {
                        position: absolute;
                        inset: 0;
                        background: rgba(0,0,0,0.5);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        opacity: 0;
                        transform: scale(0.95);
                        transition: all 0.4s ease;
                        color: #fff;
                        font-size: 1.2rem;
                        font-family: 'Playfair Display', serif;
                    }

                    .gallery-item:hover img {
                        transform: scale(1.1);
                    }

                    .gallery-item:hover .gallery-overlay {
                        opacity: 1;
                        transform: scale(1);
                    }
                    </style>



                </div>
            </div> <!-- end section-header -->
        </div> <!-- end intro-wrap -->
    </section> <!-- end s-works -->


    <section id="contact-locations" style="background: #f8f9fa; padding: 80px 0;">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 style="font-family: 'Playfair Display', serif; font-weight: 700; color: #000;">Our Locations</h2>
                    <p style="color: #555; font-size: 1rem;">Reach out to any of our branches for personalized assistance</p>
                    <div style="height: 3px; width: 60px; background: #d4af37; margin: 20px auto;"></div>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Single Location Card -->
                

                <!-- Repeat for other locations -->
                <div class="col-md-6 col-lg-4">
                    <div class="location-card">
                        <h4>Trivandrum</h4>
                        <p class="subtitle">Contact us via email to get quick response</p>
                        <div class="info-item">
                            <i class="fas fa-phone-alt"></i> +91 9072 911 001
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i> Opposite Kumar Hospital High school junction
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i> poolscapesindia@gmail.com
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="location-card">
                        <h4>Chalakkudy</h4>
                        <p class="subtitle">Contact us via email to get quick response</p>
                        <div class="info-item">
                            <i class="fas fa-phone-alt"></i> +91 9895 799 900
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i> Thayyil Building Mini Nagar, Kalikalkunnu Elinjipra P.O, Chalakkudy, Pin 680721
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i> poolscapesindia@gmail.com
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="location-card">
                        <h4>Kollam</h4>
                        <p class="subtitle">Contact us via email to get quick response</p>
                        <div class="info-item">
                            <i class="fas fa-phone-alt"></i> +91 9072 911 001
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i> Opposite Kumar Hospital High school junction
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i> poolscapesindia@gmail.com
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="location-card">
                        <h4>Thrissur</h4>
                        <p class="subtitle">Contact us via email to get quick response</p>
                        <div class="info-item">
                            <i class="fas fa-phone-alt"></i> +91 9895 706 799
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i> Chereatth Tower, NH47-Bypass signal jn, Marathakkara, Thrissur - 680306
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i> poolscapesindia@gmail.com
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="location-card">
                        <h4>Karnataka</h4>
                        <p class="subtitle">Contact us via email to get quick response</p>
                        <div class="info-item">
                            <i class="fas fa-phone-alt"></i> +91 9895 706 799
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i> No 10/11 LG, Halli, Near BEL Circle RMV 2nd Stage, Bangalore-94, Karnataka
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i> poolscapesindia@gmail.com
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="location-card">
                        <h4>Telangana</h4>
                        <p class="subtitle">Contact us via email to get quick response</p>
                        <div class="info-item">
                            <i class="fas fa-phone-alt"></i> +91 9895 706 799
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i> Near international airport outer ring road Shamshabad, Hyderabad
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i> poolscapesindia@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>

    .location-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .location-card h4 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 10px;
        color: #000;
    }

    .location-card .subtitle {
        color: #777;
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .location-card .info-item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 12px;
        margin: 8px 0;
        font-size: 1.2rem;
        color: #333;
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: start;
    }

    .location-card .info-item i {
        color: #d4af37;
        font-size: 1rem;
        min-width: 20px;
    }
    </style>





    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead" style="font-family: 'Playfair Display', serif; font-weight:500;">
                    Contact Us
                </h3>
                <h1 class="display-2 display-2--light" style="font-family: 'Playfair Display', serif; font-weight:700; letter-spacing:1px; line-height:1.2;">
                    Reach out for a new project or just say hello
                </h1>
            </div>
        </div>
        

        <div class="row contact-content" data-aos="fade-up">
            
            <div class="contact-primary">

                <h3 class="h6">Send Us A Message</h3>

                <form name="contactForm" id="contactForm" method="post" action="" novalidate="novalidate">
                    <fieldset>
    
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Your Name" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Your Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="Your Message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>

                <!-- contact-warning -->
                <div class="message-warning">
                    Something went wrong. Please try again.
                </div> 
            
                <!-- contact-success -->
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>

            </div> <!-- end contact-primary -->

            <div class="contact-secondary">
                <div class="contact-info">

                    <h3 class="h6 hide-on-fullwidth">Contact Info</h3>

                    <div class="cinfo">
                        <h5>Where to Find Us</h5>
                        <p>
                        Thayyil Building Mini Nagar<br>
                        Kalikalkunnu Elinjipra P.O<br>
                        Chalakkudy, Pin 680721
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Email Us At</h5>
                        <p>
                        poolscapesindia@gmail.com<br>
                    </div>

                    <div class="cinfo">
                        <h5>Call Us At</h5>
                        <p>
                            Phone: +91 9895 799 900<br>
                            Mobile: +91 9895 706 799<br>
                            
                        </p>
                    </div>

                    <ul class="contact-social">
                        <li>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        </li>
                    </ul> <!-- end contact-social -->

                </div> <!-- end contact-info -->
            </div> <!-- end contact-secondary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>

        <div class="row footer-main">

            <div class="col-six tab-full left footer-desc">

                <div class="footer-logo"></div>
                Poolscapes India is a leading swimming pool construction and manufacturing company, offering custom pool design, construction, and installation services across India. We specialize in premium pool tiles, pool liners, pool filters, and readymade swimming pools for residential, commercial, and hospitality projects.

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>Crafting Your Perfect Poolside Paradise.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                        <input type="submit" name="subscribe" value="Subscribe">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>

            </div>

        </div> <!-- end footer-main -->

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>&copy; 2025 Poolscapes India. All Rights Reserved. Swimming Pool Construction | Pool Tiles | Readymade Pools | Pool Equipment India</span> 
                    
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale-pulse-out">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>

    <!-- Product Showcase JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Product card hover effects
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const overlay = this.querySelector('.overlay');
                const img = this.querySelector('.product-image img');
                if (overlay) overlay.style.opacity = '1';
                if (img) img.style.transform = 'scale(1.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                const overlay = this.querySelector('.overlay');
                const img = this.querySelector('.product-image img');
                if (overlay) overlay.style.opacity = '0';
                if (img) img.style.transform = 'scale(1)';
            });
        });
    });
    </script>

</body>
</html>