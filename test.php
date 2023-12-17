<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- oninput="search(event)" -->

<body>
    <label>Search :</label>
    <input type="search" name="search" oninput="search(event)">

    <ul></ul>

    <script>
    function search(e) {
        document.querySelector('ul').innerHTML = '';
        const req = new XMLHttpRequest();
        req.open('GET', `serchtest.php?name=${e.currentTarget.value}`);
        req.send();

        req.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                const res = JSON.parse(req.responseText);
                for (let i = 0; i < res.length; i++) {
                    document.querySelector('ul').insertAdjacentHTML('beforeend', `
                            
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://picsum.photos/300/300" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title green"><a href="#">${res[i]['title']}</a></h3>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>${res[i][4]}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim,!</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Maroc</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play green">
                            <a href="#"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
                        </li>
                    </ul>
                </div>
            </article>
                        `)

                }
            }
        }


    }
    </script>
</body>

</html>