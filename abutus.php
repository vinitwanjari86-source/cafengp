<?
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Nagpur's Best Café</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f5f2;
            color: #d01111;
        }

        .about-section {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(to right, #1c4003c9, #0be934);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 50px auto;
        }

        .about-section h2 {
            font-size: 36px;
            color: #fff;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .about-section p {
            font-size: 18px;
            color: #fff;
            line-height: 1.8;
            max-width: 800px;
        }

        .about-icons {
            margin-top: 20px;
        }

        .about-icons i {
            font-size: 28px;
            color: #fff;
            margin: 0 10px;
            transition: transform 0.3s;
        }

        .about-icons i:hover {
            transform: scale(1.2);
        }

        .about-img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <section class="about-section">
        <h2>☕ Welcome to Nagpur’s Best Café ☕</h2>
        <p>
            

            Welcome to Nagpur’s Best Café, where every sip of coffee and every bite of dessert is a step into a world of flavors, warmth, and unforgettable moments. Nestled in the heart of Orange City, our café is more than just a place to eat—it's a space where stories are shared, ideas are brewed, and friendships are nurtured. Whether you're a coffee lover, a dessert enthusiast, or someone looking for a cozy escape from the everyday rush, we have something special waiting for you.
            
            Our journey began with a simple dream—to create a café that blends passion, quality, and ambiance in a way that makes every visit an experience worth cherishing. From the moment you step inside, you’ll be greeted by the rich aroma of freshly ground coffee beans, the warm glow of soft lighting, and the inviting sounds of soothing music. Our interiors are designed to offer a perfect balance of elegance and comfort, making it an ideal spot for casual catch-ups, work sessions, or peaceful solo time with a good book and a great cup of coffee.
            
            We take pride in sourcing the finest coffee beans and freshest ingredients to craft beverages and delicacies that tantalize your taste buds. Whether it's our signature handcrafted lattes, velvety cappuccinos, refreshing cold brews, or indulgent desserts, every item on our menu is created with love and attention to detail. We believe in delivering not just great taste but also a wholesome experience that keeps you coming back for more.
            
            At Nagpur’s Best Café, we celebrate the joy of food, art, and community. We frequently host live music nights, poetry readings, and art showcases, providing a platform for local talent to shine. Whether you're here to work, relax, celebrate, or simply enjoy a quiet moment, our café offers a welcoming environment where you can truly feel at home.
            
            So, come visit us, take a seat, and let the comforting flavors of our handcrafted beverages and delightful treats make your day a little brighter. Nagpur’s Best Café isn’t just a place—it’s an experience waiting to be savored!
        </p>
        <p>
            Whether you're here for a *perfectly brewed espresso, a **decadent dessert, or simply a **peaceful escape*, 
            our café is designed to satisfy your soul. Every dish is crafted with love, every cup poured with passion.  
            Come, make memories, and taste the magic of Nagpur’s finest café!  
        </p>
        
        <div class="about-icons">
            <i class="fas fa-coffee"></i>
            <i class="fas fa-cookie-bite"></i>
            <i class="fas fa-heart"></i>
        </div>

        <img src="photos/trio.jpg" alt="Cafe Image" class="about-img"><br>

       
                     <!-- Back Button -->
                     <div style="text-align: center; margin-top: 20px;">
                        <button onclick="goBack()" style="padding: 10px 20px; font-size: 20px; cursor: pointer;">Back</button>
                    </div>
                  
                    <script>
                        // Function to open the popup
                        function openPopup(card) {
                            var imageSrc = card.querySelector('img').src;
                            document.getElementById("popup-img").src = imageSrc;
                            document.getElementById("popup-modal").style.display = "flex";
                        }
                  
                        // Function to close the popup
                        function closePopup() {
                            document.getElementById("popup-modal").style.display = "none";
                        }
                  
                        // Function to go back to loc1.html
                        function goBack() {
                            window.location.href = "home.html";
                        }
                    </script>
    
    </section>

</body>
</html>