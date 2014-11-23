<div class="welcomezone">

<h1><?php echo $page?></h1>

<div style="padding-bottom:10px;">
  <div>
    <strong><?php echo htmlspecialchars_decode($page->getSummary())?></strong>
    <br clear="all"/>    
    <?php echo htmlspecialchars_decode($page->getContent())?>
    <div class="clear"></div>
  </div>

  <br clear="all">

  <div><!--Санал хүсэлт-->
    <h3>Санал хүсэлт</h3>

    <form action="http://all-free-download.com/free-website-templates/" method="post">
      <table width="97%">
        <tr>
          <td width="145" align="left" valign="top" class="body" id="Company"><strong>
            <label for="Company">Company:</label>
            </strong></td>
          <td width="280" align="left" valign="top"><input name="Company" type="text" size="40" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="Contact"><strong>
            <label for="FullName">Full name:</label>
            </strong></td>
          <td align="left" valign="top"><input name="Name" type="text" size="40" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="Address"><strong>
            <label for="Address">Address:</label>
            </strong></td>
          <td align="left" valign="top"><input name="Address" type="text" size="40" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="Phone"><strong>
            <label for="Phone">Phone:</label>
            </strong></td>
          <td align="left" valign="top"><input name="Phone" type="text" size="40" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="Email"><strong>
            <label for="Email">Email:</label>
            </strong></td>
          <td align="left" valign="top"><input name="Email" type="text" size="40" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="Comments"><strong>
            <label for="Comments">Questions / Comments:</label>
            </strong></td>
          <td align="left" valign="top"><textarea name="comments" cols="32" rows="6"></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" class="button" value="Send Now" /></td>
        </tr>
      </table>
    </form>
    
    <br clear="all">
    
    <div> 
      <h3>Хаяг байршил</h3>
      <?php if($page->getCover()) echo image_tag('/uploads/page/'.$page->getCover(), array('class'=>'project-img', 'title'=>$page, 'alt'=>$page))?>
      <p>100 Lorem Ipsum Dolor Sit<br /> 88-99 Sit Amet, Lorem<br /> USA</p>
      <p>        
        <span><img src="/images/ico-phone.png" alt="" width="20" height="16" hspace="2" /> 
        Phone:</span> (888) 123 456 789<br />
        <span><img src="/images/ico-fax.png" alt="" width="20" height="16" hspace="2" /> 
        Fax:</span> (888) 987 654 321<br />
        <span><img src="/images/ico-website.png" alt="" width="20" height="16" hspace="2" /> 
        Website:</span> <a href="http://all-free-download.com/free-website-templates/">www.mycompany.com</a><br/>
        <span><img src="/images/ico-email.png" alt="" width="20" height="16" hspace="2" /> 
        Email:</span> <a href="http://all-free-download.com/free-website-templates/">info@mycompany.com</a><br/>
        <span><img src="/images/ico-twitter.png" alt="" width="20" height="16" hspace="3" /> 
        <a href="http://all-free-download.com/free-website-templates/">Follow</a> on Twitter</span><br/>
      </p>
    </div>
          
    <br clear="all">
  </div><!--Санал хүсэлт-->

</div><!--style="padding-bottom:10px;"-->

</div><!--welcomezone-->
