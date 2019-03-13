var post_news = document.getElementsByClassName("post_news");
var post_content = document.getElementsByName("post_content");
for(i = 0; i<post_news.length; i++){

    post_news[i].children[post_news[i].children.length-1].style.opacity=0.5;

}


var post = document.getElementsByClassName('post-content');
var showPost = document.getElementsByClassName('text_post');

var hiddenSubject = document.querySelectorAll('.subject');
var loading = document.getElementsByClassName('loading')[0];
var page_lik = document.getElementsByClassName('page_link')[0];


var array = Array.prototype.slice.call(hiddenSubject,0)

array.forEach(function(el){

    var viewMore = el.querySelector('.read_more'),

    rm = document.getElementsByClassName('read_more'),
    sub = document.getElementsByClassName('subject'),
    ld = document.getElementsByClassName('loading'),
    pg = document.getElementsByClassName('page_link');
   
    var showPost = el.querySelector('.text_post');

    viewMore.onclick = function(){
        for(var i =0; i<sub.length; i ++){
            sub[i].style.display = 'none';
            rm[i].style.display='none';
            for(j = 0; j<post_news.length; j++){
                post_news[j].children[post_news[j].children.length-1].style.opacity=1.0;
            }
            ld[0].style.display='block';



        }
        el.style.display = "block";
        setTimeout(function() {
            axios({
                method: 'GET',
                url: 'http://localhost:81/demo_project/api.php',
                params: {
                    subject_id : viewMore.dataset.show,
                }
            }).then((data) => {
                const posts = data.data;
                posts.map(function(item){
                    let post =
                    `
                    <div class="post-content">
                    <div class="card-post">
                    <div class="title-post"><a href="">${item.title} </a></div>
                    <div class="text-author">
                    <div class="author">
                    ${item.author}
                    </div>
                    <div class="favorite" style="display: flex; justify-content:flex-end;">
                    <div><img src="images/trang-chu/icon-view.png" alt="icon-view">&nbsp;${item.view}</div>&nbsp;&nbsp;
                    <div><img src="images/trang-chu/icon-favorite.png" alt="icon-like">&nbsp;${item.like}</div>&nbsp;&nbsp;
                    </div>
                    </div>
                    <div class="text-content"> ${item.content}</div>

                    </div>
                    </div>
                    `;

                    showPost.innerHTML += post; 


                });
                setTimeout(function() {
                    ld[0].style.display = 'none';
                    pg[0].style.display = 'block';
                }, 1);
            });
        }, 1300);

    }
})


