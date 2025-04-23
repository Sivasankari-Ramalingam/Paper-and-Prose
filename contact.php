<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Paper & Prose Bookstore</title>
    <link rel="stylesheet" href="style_new.css">
    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    
    <main class="contact-container">
        <section class="hero-section">
            <h1>Contact Us</h1>
            <div class="subtitle">We'd love to hear from you</div>
        </section>
        
        <section class="contact-content">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Visit Our Store</h2>
                    <div class="info-block">
                        <h3>Address</h3>
                        <p>123 Bookworm Lane<br>Literary District<br>Bibliophile City, BC 10101</p>
                    </div>
                    
                    <div class="info-block">
                        <h3>Hours</h3>
                        <p>Monday - Saturday: 10:00 AM - 8:00 PM<br>Sunday: 11:00 AM - 6:00 PM</p>
                    </div>
                    
                    <div class="info-block">
                        <h3>Contact</h3>
                        <p>Phone: (555) 123-4567<br>Email: hello@paperandprose.com</p>
                    </div>
                    
                    <div class="social-links">
                        <h3>Follow Us</h3>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i> Instagram</a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i> Twitter</a>
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i> Facebook</a>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <h2>Send Us a Message</h2>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject">
                                <option value="general">General Inquiry</option>
                                <option value="order">Order Status</option>
                                <option value="event">Event Information</option>
                                <option value="feedback">Feedback</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-button">Send Message</button>
                    </form>
                </div>
            </div>
            
            <div class="map-section">
                <h2>Find Us</h2>
                <div class="map-container">
                    <img src="/api/placeholder/900/400" alt="Map showing bookstore location" class="map-image">
                </div>
                <div class="directions">
                    <h3>Directions</h3>
                    <p>We're located in the heart of the Literary District, just two blocks from Central Station. Street parking is available, and there's a public parking garage one block south of our location.</p>
                    <p>Public Transit: Take the Blue Line to Central Station or bus routes 42 and 53 stop directly in front of our store.</p>
                </div>
            </div>
            
            <div class="events-section">
                <h2>Upcoming Events</h2>
                <p>Join us for book readings, signings, and community gatherings. Check our events calendar for details or sign up for our newsletter to stay informed about special happenings at Paper & Prose.</p>
                <a href="#" class="events-button">View Events Calendar</a>
            </div>
        </section>
    </main>
    
    <!-- Footer  -->
</body>
</html>