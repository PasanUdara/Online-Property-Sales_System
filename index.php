<?php
include_once('header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="js/script.js"></script>
    <title>Ops Solutions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
        <div class="container">
            <div class="background-img"></div>
                <div class="content">
                <span class="content-text">
                    Buy and Sell <br>
                    Property <br>
                    in All Over the World
                </span>
                </div>

                <div class="intro-section">
                    <h2>Welcome to Ops Solutions</h2>
                    <p>We offer a comprehensive platform to buy, sell, and explore properties worldwide. Whether you're looking for homes, lands, or vehicles, we have something for everyone. Browse our property listings and get in touch with trusted agents.</p>
                    <button onclick="exploreProperties()" class="explore-btn">Explore Properties</button>
                </div>
        </div>
        <div class="body-container">
            <div class="actions">
                <div class="action-wrapper">
                    <img src="Img/new-projects.svg" alt="" class="action-img">
                    <span class="action-header">New Projects</span>
                    <span class="action-description">Most Popular Upcoming & Ongoing <br>
                     Projects within Your Budget</span>
                </div>
                <div class="action-wrapper">
                    <img src="Img/find_property.svg" alt="" class="action-img">
                    <span class="action-header">Find Property</span>
                    <span class="action-description">Search properties from largest property <br>
                    database as per your Criteria</span>
                </div>
                <div class="action-wrapper">
                    <img src="Img/search-buyers.svg" alt="" class="action-img">
                    <span class="action-header">Search Buyers</span>
                    <span class="action-description">Best Property Platform to Make Direct <br>
                     Deals Between Buyers and Sellers</span>
                </div>
            </div>
            <div class="property-container">
                <h1>Recent Properties</h1>
                <span class="property-text">Find a home that's right for you</span>
                <div class="property-list-wrapper">
                <div class="property-list">
                    <img src="Img/property1.jpg" alt="" class="property-img">
                    <div class="property-list-icons">
                        <img src="Img/bathtub.svg" alt="" class="icon">|
                        <img src="Img/bedroom.svg" alt="" class="icon">|
                        <img src="Img/qty.svg" alt="" class="icon">|
                        <img src="Img/building.svg" alt="" class="icon">
                    </div>
                    <div class="propery-details">
                        <span class="property-header">Family House in Kothalawala</span>
                        <spna class="property-location">No, 145 Kothalawala Kaduwela</spna>
                        <span class="price">$3,500.00</span>
                    </div>
                </div>
                <div class="property-list">
                    <img src="Img/property2.jpg" alt="" class="property-img">
                    <div class="property-list-icons">
                        <img src="Img/bathtub.svg" alt="" class="icon">|
                        <img src="Img/bedroom.svg" alt="" class="icon">|
                        <img src="Img/qty.svg" alt="" class="icon">|
                        <img src="Img/building.svg" alt="" class="icon">
                    </div>
                    <div class="propery-details">
                        <span class="property-header">Villa on Kaduwela</span>
                        <spna class="property-location">No, 200 Kaduwela</spna>
                        <span class="price">$4,500.00</span>
                    </div>
                </div>
                <div   class="property-list">
                    <img src="Img/property3.jpg" alt="" class="property-img">
                    <div class="property-list-icons">
                        <img src="Img/bathtub.svg" alt="" class="icon">|
                        <img src="Img/bedroom.svg" alt="" class="icon">|
                        <img src="Img/qty.svg" alt="" class="icon">|
                        <img src="Img/building.svg" alt="" class="icon">
                    </div>
                    <div class="propery-details">
                        <span class="property-header">Beach House</span>
                        <spna class="property-location">No, 23/4 Chilaw</spna>
                        <span class="price">$5,000.00</span>
                    </div>
                </div>
                </div>
            </div>

            <div class="agent-container">
                <div class="agents">
                <div class="agent-details-wrapper">
                    <div class="agent-details">
                    <img src="Img/agent1.jpg" alt="" class="agent-img">
                    <div class="listing">
                        <span class="view-listing">View List</span>
                    </div>
                    <span class="agent-name">Lakshitha Kalhara</span>
                    <span class="agent-type">Pearl Real-Estate</span>
                    <div class="horizontol-line"></div>
                    <span class="agent-tel">+94123456789</span>
                    </div>
                </div>

                <div class="agent-details-wrapper">
                    <div class="agent-details">
                    <img src="Img/agent2.jpg" alt="" class="agent-img">
                    <div class="listing">
                        <span class="view-listing">View List</span>
                    </div>
                    <span class="agent-name">Guwani Hathurusinghe</span>
                    <span class="agent-type">Pearl Real-Estate</span>
                    <div class="horizontol-line"></div>
                    <span class="agent-tel">+94123456789</span>
                    </div>
                </div>

                <div class="agent-details-wrapper">
                    <div class="agent-details">
                    <img src="Img/agent3.jpg" alt="" class="agent-img">
                    <div class="listing">
                        <span class="view-listing">View List</span>
                    </div>
                    <span class="agent-name">Ishara Sandaruwan</span>
                    <span class="agent-type">Pearl Real-Estate</span>
                    <div class="horizontol-line"></div>
                    <span class="agent-tel">+94123456789</span>
                    </div>
                </div>

                <div class="agent-details-wrapper">
                    <div class="agent-details">
                    <img src="Img/agent4.png" alt="" class="agent-img">
                    <div class="listing">
                        <span class="view-listing">View List</span>
                    </div>
                    <span class="agent-name">Hasini Sandamini</span>
                    <span class="agent-type">Pearl Real-Estate</span>
                    <div class="horizontol-line"></div>
                    <span class="agent-tel">+94123456789</span>
                    </div>
                </div>
                </div>
            </div>

                
                
            </div>
        
        </div>

        
</body>
</html>

<?php
include_once('footer.php');
?>