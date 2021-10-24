            <?php
        /*
            To recap: we will use include();

            include() vs include_once:
            - include(): can include/embed/insert the same code as many time as we need/want
            - include_once(): can include/embed/insert the same code ONLY one time

            Both types of include will try to include the file/code:
            - if the file does exist => everything is normal
              include the file code and continue rendering our page
            - if the file does NOT exits => display an error message and continue rendering the rest of our page
        */
        
        // include_once('templates/head.php'); // display the error and continue with our page
        include_once 'templates/header.php';
            ?>
            <h2>What you need to know about spa!</h2>
            <p>A spa is a location where mineral-rich spring water (and sometimes seawater) is used to give medicinal baths.
                Spa towns or spa resorts (including hot springs resorts) typically offer various health treatments, which
                are also known as balneotherapy. The belief in the curative powers of mineral waters goes back to prehistoric
                times. Such practices have been popular worldwide, but are especially widespread in Europe and Japan. Day
                spas are also quite popular, and offer various personal care treatments.</p>
            <ol>
                <li>
                    <a href="#Origins">Origins of the Term</a>
                    <ol>
                        <li>Bathing in Greek and Roman times</li>
                        <li>Bathing in medieval times</li>
                        <li>Bathing in the 18th century</li>
                        <li>Bathing in the 19th and 20th centuries</li>
                    </ol>
                </li>
                <li>
                    <a href="#Treat">Treatments</a>
                </li>
                <li>
                    <a href="#Trends">Recent Trends</a>
                </li>
                <li>
                    <a href="#Types">Types of Treatments</a>
                </li>
            </ol>
            <h3 id="Origins">Origins of the term</h3>
            <p>The term is derived from the name of the town of Spa, Belgium, whose name is known back from Roman times, when
                the location was called Aquae Spadanae, sometimes incorrectly connected to the Latin word spargere meaning
                to scatter, sprinkle or moisten. The word spa itself denotes "fountain". Some experts also suggest that the
                word "spa" originated from the name of the Belgian town named Spa where a curative natural spring was discovered
                in the 14th century.
            </p>
            <h3 id="Treat">Treatments</h3>
            <p>A 'body treatment', 'spa treatment', or 'cosmetic treatment' is non-medical procedure to help the health of the
                body. It is often performed at a resort, destination spa, day spa, beauty salon or school.
            </p>
            <h3 id="Trends">Recent trends</h3>
            <p>In the modern world spa therapies are linked to various domains including beauty, pampering, indulgence, and
                health. Spa industry is thought to be growing at a significantly high rate, and most importantly it is observed
                to embrace wellness as its core business. By the late 1930s more than 2,000 hot- or cold-springs health resorts
                were operating in the United States.
            </p>
            <h3 id="Types">Types of treatments</h3>
            <ul>
                <li>Day spa, a form of beauty salon.</li>
                <li>Destination spa, a resort for personal care treatments.</li>
                <li>Spa town, a town visited for the supposed healing properties of the water.</li>
                <li>Foot spa</li>
            </ul>
            <?php
require_once 'templates/footer.php';
?>