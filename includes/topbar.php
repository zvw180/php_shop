<div class="top-bar">
    <div class="content-topbar flex-sb-m h-full container">
        <div class="left-top-bar">
           <?php
           include ('config/config.php');
           $stmt = $conn->prepare("SELECT * FROM topbar");
           $stmt->execute();
           $result = $stmt->get_result();
           $row = $result->fetch_assoc();
           echo $row['khauhieu'];
           ?>
        </div>

        <div class="right-top-bar flex-w h-full">
            <a href="#" class="flex-c-m trans-04 p-lr-25">
                Help & FAQs
            </a>

            <a href="#" class="flex-c-m trans-04 p-lr-25">
                My Account
            </a>

            <a href="#" class="flex-c-m trans-04 p-lr-25">
                EN
            </a>

            <a href="#" class="flex-c-m trans-04 p-lr-25">
                USD
            </a>
        </div>
    </div>
</div>