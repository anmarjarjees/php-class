            <?php
        /*
            To recap: we will use require();

            require() vs require_once:
            - require(): can include/embed/insert the same code as many time as we need/want
            - require_once(): can include/embed/insert the same code ONLY one time

            Both types of require will try to include the required file/code:
            - if the file does exist => everything is normal
              include the file code and continue rendering our page 
            - if the file does NOT exits => display an error message (like using include statement)
              and stop our page/application from being loaded 
        */
        
            require_once 'templates/header.php';
            ?>
            <h2>What we can provide you!</h2>
            <h3>Massages</h3>
            <dl>
                <dt>Sports Massage</dt>
                <dd>Our deepest massage for tense and sore muscles. Not recommended for first-time massage clients.</dd>
                <dt>Swedish Massage</dt>
                <dd>A gentle, relaxing massage. Promotes balance and wellness. Warms muscle tissue and increases circulation.</dd>
                <dt>Hot Stone Massage</dt>
                <dd> Uses polished local river rocks to distribute gentle heat. Good for tight, sore muscles. Balances and invigorates
                    the body muscles. Advance notice required.</dd>
            </dl>
            <table>
                <thead>
                    <tr>
                        <th colspan="4">The service you need for your body</th>
                    </tr>
                    <tr>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Service</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Revitalizing Facial</td>
                        <td>A light massage with a customized essential oil blend that moisturizes the skin and restores circulation.</td>
                        <td>Gentlemen's Facial</td>
                        <td>A cleansing facial that restores a healthz glow. Includes a neck and shoulder massage.</td>
                    </tr>
                    <tr>
                        <td>Milk Mask</td>
                        <td>A soothing mask that softens and moisturizes the face. Leaves your skin looking younger.</td>
                        <td>Salt Glow</td>
                        <td>Imported sea salt are massaged into the skin, exfoliating and cleansing the pores.</td>
                    </tr>
                    <tr>
                        <td>Herbal Wrap</td>
                        <td>Organic lavander blooms create a detoxifying and calming treatment to relieve aches and pains.</td>
                        <td>Seaweed Body Wrap</td>
                        <td>Seaweed is a natural detoxifying agent that also helps improve circulation.</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" align="center">All these services are provided on daily bases</td>
                    </tr>
                </tfoot>
            </table>
            <?php
require_once 'templates/footer.php';
?>
