
<?php
                    $sql = "SELECT * FROM `sitedetail`";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $systemName = $row['systemName'];
                    $address = $row['address'];
                    $email = $row['email'];
                    $contact1 = $row['contact1'];
                    $contact2 = $row['contact2'];