<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .news-container {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    font-family: "Roboto", sans-serif;
    box-shadow: 0 4px 8px -4px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    overflow-x: hidden;
    background: #000000;


}

.news-container ul {
    display: flex;
    list-style: none;
    margin: 0;
    animation: scroll 20s infinite linear;
    
    
}

.news-container ul li {
    white-space: nowrap;
    padding: 10px 24px;
    color: white;
    position: relative;
}


@keyframes scroll {
    from {
        transform: translateX(100%);
    }

    to {
        transform: translateX(-1083px);

    }
}
</style>
<body>
<div class="news-container">
    <ul>
        <li>New Arrival Announcement: Discover our latest shoe collection!</li>
        <li>Enjoy a special discount on all Nike and Adidas shoes this week!</li>
        <li>Hurry, limited-time offer. Shop now and elevate your style!</li>
    </ul>
</div>

</body>
</html>