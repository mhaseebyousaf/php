<?php
    include("admin-header.php");

?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                <?php
                    include("admin-side-bar.php");
                 ?>
                <div class="col-sm-10 px-0">
                    <div class="container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Options</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="w-100 pb-5" id="options-section-form">
                                    <div class="container-fluid">
                                    <?php 
                                      $db->select("options","*",null,null,null,null);
                                      $row = $db->getResult();
                                      if (!empty($row[0])) {
                                      ?>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              
                                              <label for="options-site-name"><b>Site Name</b></label>
                                              <input type="hidden" name="options-id" id="options-id" value="<?php echo $row[0][0]["option_id"] ?>">
                                              <input type="text" name="options-site-name" id="options-site-name" value="<?php echo $row[0][0]["site_name"] ?>" class="form-control" placeholder="Site Name" aria-describedby="options-site-name-helpId">
                                              <small id="options-site-name-helpId" class="text-muted">Site Name</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-site-title"><b>Site Title</b></label>
                                              <input type="text" name="options-site-title" id="options-site-title" class="form-control" value="<?php echo $row[0][0]["site_title"] ?>" placeholder="Site Title" aria-describedby="options-site-title-helpId">
                                              <small id="options-site-title-helpId" class="text-muted">Site Title</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-site-description"><b>Site Description</b></label>
                                              <textarea class="form-control" name="options-site-description" id="options-site-description" placeholder="This is a great site for your e-commerce store to maintain and manage." rows="3">
                                              <?php echo $row[0][0]["site_description"] ?>
                                              </textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-site-email"><b>Site Email</b></label>
                                              <input type="email" class="form-control" name="options-site-email" value="<?php echo $row[0][0]["site_email"] ?>" id="options-site-email" aria-describedby="options-site-email-emailHelpId" placeholder="abc@gmail.com">
                                              <small id="options-site-email-emailHelpId" class="form-text text-muted">Site Email</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-contact"><b>Contact</b></label>
                                              <input type="text" name="options-contact" id="options-contact" class="form-control" value="<?php echo $row[0][0]["site_contact"] ?>" placeholder="+92 0000000000" aria-describedby="options-contact-helpId">
                                              <small id="options-contact-helpId" class="text-muted">Contact</small>
                                            </div>
                                            <div id="options-message-box">

                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="options-logo"><b>Logo</b></label>
                                              <input type="file" class="form-control-file" name="options-logo" id="options-logo" placeholder="Select Logo" aria-describedby="options-logo-fileHelpId">
                                              <input type="hidden" name="options-logo-old-image" value="<?php echo $row[0][0]["site_logo"] ?>">
                                              <small id="options-logo-fileHelpId" class="form-text text-muted">Select a logo</small>
                                            </div>
                                            <div id="options-logo-show-box">
                                              <img src="../uploads/logo/<?php echo $row[0][0]["site_logo"] ?>" id="options-logo-img" alt="">
                                            </div>
                                            <div class="form-group">
                                              <label for="options-footer-text"><b>Footer Text</b></label>
                                              <input type="text" name="options-footer-text" value="<?php echo $row[0][0]["site_footer_text"] ?>" id="options-footer-text" class="form-control" placeholder="xyz&copy;copyright" aria-describedby="options-footer-text-helpId">
                                              <small id="options-footer-text-helpId" class="text-muted">Footer Text</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-currency-format"><b>Currency Format</b></label>
                                              <input type="text" name="options-currency-format" value="<?php echo $row[0][0]["site_currency_format"] ?>" id="options-currency-format" class="form-control" placeholder="Rs." aria-describedby="options-currency-format-helpId">
                                              <small id="options-currency-format-helpId" class="text-muted">Currency Format</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-current-address"><b>Current Address</b></label>
                                              <textarea class="form-control" name="options-current-address" id="options-current-address" rows="3" placeholder="lorem street, ipsum house no 234, lahore">
                                              <?php echo $row[0][0]["site_current_address"] ?>
                                              </textarea>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                        </div>
                                        <?php 
                                          } else {
                                        ?>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              
                                              <label for="options-site-name"><b>Site Name</b></label>
                                              <input type="text" name="options-site-name" id="options-site-name" class="form-control" placeholder="Site Name" aria-describedby="options-site-name-helpId">
                                              <small id="options-site-name-helpId" class="text-muted">Site Name</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-site-title"><b>Site Title</b></label>
                                              <input type="text" name="options-site-title" id="options-site-title" class="form-control" placeholder="Site Title" aria-describedby="options-site-title-helpId">
                                              <small id="options-site-title-helpId" class="text-muted">Site Title</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-site-description"><b>Site Description</b></label>
                                              <textarea class="form-control" name="options-site-description" id="options-site-description" placeholder="This is a great site for your e-commerce store to maintain and manage." rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-site-email"><b>Site Email</b></label>
                                              <input type="email" class="form-control" name="options-site-email" id="options-site-email" aria-describedby="options-site-email-emailHelpId" placeholder="abc@gmail.com">
                                              <small id="options-site-email-emailHelpId" class="form-text text-muted">Site Email</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-contact"><b>Contact</b></label>
                                              <input type="text" name="options-contact" id="options-contact" class="form-control" placeholder="+92 0000000000" aria-describedby="options-contact-helpId">
                                              <small id="options-contact-helpId" class="text-muted">Contact</small>
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="options-logo"><b>Logo</b></label>
                                              <input type="file" class="form-control-file" name="options-logo" id="options-logo" placeholder="Select Logo" aria-describedby="options-logo-fileHelpId">
                                              <small id="options-logo-fileHelpId" class="form-text text-muted">Select a logo</small>
                                            </div>
                                            <div id="options-logo-show-box">
                                              <img src="" id="options-logo-img" alt="">
                                            </div>
                                            <div class="form-group">
                                              <label for="options-footer-text"><b>Footer Text</b></label>
                                              <input type="text" name="options-footer-text" id="options-footer-text" class="form-control" placeholder="xyz&copy;copyright" aria-describedby="options-footer-text-helpId">
                                              <small id="options-footer-text-helpId" class="text-muted">Footer Text</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-currency-format"><b>Currency Format</b></label>
                                              <input type="text" name="options-currency-format" id="options-currency-format" class="form-control" placeholder="Rs." aria-describedby="options-currency-format-helpId">
                                              <small id="options-currency-format-helpId" class="text-muted">Currency Format</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="options-current-address"><b>Current Address</b></label>
                                              <textarea class="form-control" name="options-current-address" id="options-current-address" rows="3" placeholder="lorem street, ipsum house no 234, lahore"></textarea>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                        </div>
                                        <?php 
                                          }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
include "footer.php";
?>