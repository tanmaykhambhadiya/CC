<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="shortcut icon" href="LOGO for website (circular).png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="LOGO for website (circular).png">
    <title>Alan Walker - Walkerworld India Pt II | Guwahati</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
        }
        
        .header {
            background-color: #000;
            color: white;
            padding: 40px 20px;
            position: relative;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .artist-name {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .tour-name {
            font-size: 22px;
            margin-bottom: 10px;
        }
        
        .view-all {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
        }
        
        .event-details {
            display: flex;
            flex-wrap: wrap;
            margin-top: 30px;
            gap: 40px;
        }
        
        .detail {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .detail-text h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .detail-text p {
            font-size: 14px;
            color: #ccc;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }
        
        .logo {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            width: 120px;
            height: 120px;
            background-color: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo img {
            width: 80%;
        }
        
        .main-content {
            margin-top: 30px;
        }
        
        .ticket-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .book-btn {
            background-color: #e91e63;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
        }
        
        .accommodation {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .accommodation-header {
            font-size: 20px;
            margin-bottom: 20px;
            font-style: italic;
        }
        
        .date-selector {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .calendar-icon, .person-icon, .settings-icon {
            font-size: 20px;
        }
        
        .see-accommodation {
            background-color: white;
            border: 1px solid #ddd;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .map-container {
            height: 300px;
            position: relative;
            margin-bottom: 20px;
            background-color: #eee;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .show-list {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            font-weight: 600;
        }
        
        .map-controls {
            position: absolute;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .map-control {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .map-attribution {
            position: absolute;
            bottom: 5px;
            left: 5px;
            font-size: 10px;
            color: #666;
        }
        
        .side-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .share-header {
            font-size: 18px;
            margin-bottom: 15px;
        }
        
        .share-icons {
            display: flex;
            gap: 15px;
        }
        
        .share-icon {
            width: 35px;
            height: 35px;
            background-color: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .bio-section {
            margin-top: 20px;
        }
        
        .bio-header {
            font-size: 18px;
            margin-bottom: 15px;
            font-style: italic;
        }
        
        .bio-text {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        
        .read-more {
            color: #e91e63;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
        
        .genre-tags {
            display: flex;
            gap: 10px;
            margin: 15px 0;
        }
        
        .genre {
            background-color: #f5f5f5;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .follow-btn {
            background-color: #e91e63;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 20px;
        }
        
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background-color: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Layout */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        
        /* Map Interactivity */
        .map-interactive {
            position: relative;
            width: 100%;
            height: 100%;
        }
        
        .map-marker {
            position: absolute;
            background-color: #e91e63;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
            transform: translate(-50%, -50%);
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            z-index: 10;
        }
        
        .map-marker:hover {
            background-color: #ff4081;
        }
        
        .map-marker::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: #e91e63 transparent transparent transparent;
        }
        
        .map-marker-info {
            position: absolute;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            min-width: 150px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 20;
            display: none;
        }
        
        .map-marker:hover + .map-marker-info {
            display: block;
        }
        
        .marker-title {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .marker-price {
            color: #e91e63;
            font-weight: bold;
            font-size: 16px;
        }
        
        .marker-distance {
            font-size: 12px;
            color: #666;
            margin-top: 3px;
        }
        
        .nearby-places {
            margin-top: 20px;
        }
        
        .place-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .place-item:last-child {
            border-bottom: none;
        }
        
        .place-info h4 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .place-distance {
            font-size: 12px;
            color: #666;
        }
        
        .place-price {
            color: #e91e63;
            font-weight: bold;
            font-size: 16px;
        }
        
        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .logo {
                position: static;
                transform: none;
                margin: 20px auto;
            }
            
            .event-details {
                flex-direction: column;
                gap: 20px;
            }
            
            .date-selector {
                flex-wrap: wrap;
            }
        }
        
            .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4285f4;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        .back-button:hover {
            background-color: #3367d6;
        }
        /* Background components */
.video-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
}

.video-background video {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    filter: blur(5px) brightness(0.4);
    object-fit: cover;
}

.static-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    background-color: #000;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('concert-background.jpg');
    background-size: cover;
    background-position: center;
}
    </style>
</head>
<body>
    
     <a href="e1.html" class="back-button">← Back</a>
    <div class="header">
        <div class="container">
            <h1 class="artist-name">Alan Walker</h1>
            <h2 class="tour-name">Walkerworld India Pt II</h2>
            <a href="e1.html" class="view-all">View All Concerts</a>
            
            <div class="event-details">
                <div class="detail">
                    <div class="detail-icon">📍</div>
                    <div class="detail-text">
                        <h3>Guwahati</h3>
                        <p>Guwahati, India</p>
                    </div>
                </div>
                
                <div class="detail">
                    <div class="detail-icon">📅</div>
                    <div class="detail-text">
                        <h3>Apr 17, 2025</h3>
                        <p>6:00 PM GMT+5:30</p>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-outline">Get Reminder</button>
                <button class="btn btn-outline">Book a Hotel</button>
            </div>
            
            <div class="logo">
                <img src="1.png" alt="Alan Walker Logo">
            </div>
        </div>
    </div>
    
    <div class="container main-content">
        <div class="content-grid">
            <div class="left-column">
                <div class="ticket-section">
                    <div class="ticket-header">
                        <h3>Get Tickets</h3>
                        <button href="" class="book-btn">Get Your Tickets</button>
                    </div>
                    <p>Tickets starting from ₹2000 onwards</p>
                </div>
                
                <div class="accommodation">
                    <h3 class="accommodation-header">Find a place to stay</h3>
                    
                    <div class="date-selector">
                        <div class="date">
                            <span class="calendar-icon">📅</span>
                            <span>Apr 17 - Apr 18</span>
                        </div>
                        
                        <div class="guests">
                            <span class="person-icon">👤</span>
                            <span>2</span>
                        </div>
                        
                        <div class="settings">
                            <span class="settings-icon">⚙️</span>
                        </div>
                        
                        <button class="see-accommodation">
                            <span class="hotel-icon">🏨</span>
                            <span>See accommodations</span>
                        </button>
                    </div>
                    
                    <div class="map-container">
                        <div class="map-interactive">
                            <img src="5.jpeg" alt="Map of Guwahati" style="width: 100%; height: 100%; object-fit: cover;">
                            
                            <!-- Hotel Marker 1 -->
                            <div class="map-marker" style="top: 45%; left: 30%"></div>
                            <div class="map-marker-info" style="top: 30%; left: 30%">
                                <div class="marker-title">Rajnigandha Travels</div>
                                <div class="marker-price">₹1,120</div>
                                <div class="marker-distance">0.8 km from venue</div>
                            </div>
                            
                            <!-- Hotel Marker 2 -->
                            <div class="map-marker" style="top: 60%; left: 50%"></div>
                            <div class="map-marker-info" style="top: 45%; left: 50%">
                                <div class="marker-title">Hotel Paradise Inn</div>
                                <div class="marker-price">₹1,850</div>
                                <div class="marker-distance">1.2 km from venue</div>
                            </div>
                            
                            <!-- Hotel Marker 3 -->
                            <div class="map-marker" style="top: 35%; left: 65%"></div>
                            <div class="map-marker-info" style="top: 20%; left: 65%">
                                <div class="marker-title">Guwahati Continental</div>
                                <div class="marker-price">₹2,240</div>
                                <div class="marker-distance">1.5 km from venue</div>
                            </div>
                            
                            <!-- Venue Marker -->
                            <div class="map-marker" style="top: 50%; left: 45%; background-color: #2196f3;"></div>
                            <div class="map-marker-info" style="top: 35%; left: 45%">
                                <div class="marker-title">Concert Venue</div>
                                <div class="marker-distance">Alan Walker - Walkerworld India Pt II</div>
                            </div>
                        </div>
                        
                        <button class="show-list">↑ Show List</button>
                        
                        <div class="map-controls">
                            <div class="map-control">+</div>
                            <div class="map-control">-</div>
                        </div>
                        
                        <div class="map-attribution">
                            Stay22 | © Stadia Maps © OpenMapTiles © OpenStreetMap
                        </div>
                    </div>
                    
                    <div class="nearby-places">
                        <div class="place-item">
                            <div class="place-info">
                                <h4>Rajnigandha Travels</h4>
                                <div class="place-distance">0.8 km from venue</div>
                            </div>
                            <div class="place-price">₹1,120</div>
                        </div>
                        
                        <div class="place-item">
                            <div class="place-info">
                                <h4>Hotel Paradise Inn</h4>
                                <div class="place-distance">1.2 km from venue</div>
                            </div>
                            <div class="place-price">₹1,850</div>
                        </div>
                        
                        <div class="place-item">
                            <div class="place-info">
                                <h4>Guwahati Continental</h4>
                                <div class="place-distance">1.5 km from venue</div>
                            </div>
                            <div class="place-price">₹2,240</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="right-column">
                <div class="side-section">
                    <h3 class="share-header">Share Event</h3>
                    <div class="share-icons">
                        <div class="share-icon">f</div>
                        <div class="share-icon">𝕏</div>
                        <div class="share-icon">✉</div>
                        <div class="share-icon">🔗</div>
                    </div>
                </div>
                
                <div class="side-section bio-section">
                    <h3 class="bio-header">Alan Walker Biography</h3>
                    <p class="bio-text">When I was a kid, I had a fascination for programming and graphic design...</p>
                    <a href="#" class="read-more">Read More</a>
                    
                    <div class="genre-tags">
                        <span class="genre">EDM</span>
                        <span class="genre">Electronic Pop Music</span>
                    </div>
                    
                    <button class="follow-btn">Follow Artist</button>
                    
                    <div class="social-links">
                        <div class="social-icon">f</div>
                        <div class="social-icon">📷</div>
                        <div class="social-icon">𝕏</div>
                        <div class="social-icon">🎵</div>
                        <div class="social-icon">🍎</div>
                        <div class="social-icon">🔊</div>
                        <div class="social-icon">🎵</div>
                        <div class="social-icon">▶️</div>
                        <div class="social-icon">📺</div>
                        <div class="social-icon">📻</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Simple interactive map functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Show list functionality
            const showListBtn = document.querySelector('.show-list');
            const nearbyPlaces = document.querySelector('.nearby-places');
            
            showListBtn.addEventListener('click', function() {
                if (nearbyPlaces.style.display === 'none') {
                    nearbyPlaces.style.display = 'block';
                    showListBtn.textContent = '↓ Hide List';
                } else {
                    nearbyPlaces.style.display = 'none';
                    showListBtn.textContent = '↑ Show List';
                }
            });
            
            // Map markers interaction
            const mapMarkers = document.querySelectorAll('.map-marker');
            const placeItems = document.querySelectorAll('.place-item');
            
            mapMarkers.forEach((marker, index) => {
                if (index < placeItems.length) {
                    // Highlight corresponding list item when hovering over marker
                    marker.addEventListener('mouseenter', function() {
                        placeItems[index].style.backgroundColor = '#f5f5f5';
                    });
                    
                    marker.addEventListener('mouseleave', function() {
                        placeItems[index].style.backgroundColor = '';
                    });
                }
            });
            
            // List items interaction with map markers
            placeItems.forEach((item, index) => {
                item.addEventListener('mouseenter', function() {
                    if (index < mapMarkers.length) {
                        mapMarkers[index].style.transform = 'translate(-50%, -50%) scale(1.3)';
                        mapMarkers[index].style.zIndex = '30';
                        
                        // Show info for this marker
                        const info = mapMarkers[index].nextElementSibling;
                        if (info && info.classList.contains('map-marker-info')) {
                            info.style.display = 'block';
                        }
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (index < mapMarkers.length) {
                        mapMarkers[index].style.transform = 'translate(-50%, -50%)';
                        mapMarkers[index].style.zIndex = '10';
                        
                        // Hide info
                        const info = mapMarkers[index].nextElementSibling;
                        if (info && info.classList.contains('map-marker-info')) {
                            info.style.display = '';
                        }
                    }
                });
                
                // Make list items clickable
                item.style.cursor = 'pointer';
                item.addEventListener('click', function() {
                    alert('Booking page for ' + item.querySelector('h4').textContent);
                });
            });
            
            // Map zoom controls
            const zoomControls = document.querySelectorAll('.map-control');
            const mapImage = document.querySelector('.map-interactive img');
            let zoomLevel = 1;
            
            zoomControls[0].addEventListener('click', function() {
                if (zoomLevel < 1.5) {
                    zoomLevel += 0.1;
                    mapImage.style.transform = `scale(${zoomLevel})`;
                }
            });
            
            zoomControls[1].addEventListener('click', function() {
                if (zoomLevel > 0.8) {
                    zoomLevel -= 0.1;
                    mapImage.style.transform = `scale(${zoomLevel})`;
                }
            });
        });
    </script>
</body>
</html>