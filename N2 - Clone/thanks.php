<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TSL</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .thank-you-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .thank-you-content {
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3498db;
        }

        p {
            color: #555;
            margin: 15px 0;
        }

        .back-to-home {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-to-home:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <div class="thank-you-content">
            <h1>Cảm ơn bạn đã mua hàng!</h1>
            <p>Chúng tôi rất trân trọng sự ủng hộ của bạn.</p>
            <p>Xin vui lòng vào đơn hàng để kiểm tra sản phẩm.</p>
            <a href="./order.php" class="back-to-home">Xem đơn hàng</a>
        </div>
    </div>
</body>
</html>