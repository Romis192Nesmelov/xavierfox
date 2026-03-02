$(document).ready(function() {
    let articleContent = $('.article-content'),
        tocList = $('.toc-list'),
        sectionCounter = 1;

    if (articleContent.length) {
        articleContent.find('section').each(function() {
            let sectionId = 'section' + sectionCounter;
            $(this).attr('id',sectionId);
            sectionCounter++;

            let head = $(this).find('h2').html();
            tocList.append($('<li></li>').append($('<a></a>').attr('href','#'+sectionId).html(head)));
        });
    }
});
