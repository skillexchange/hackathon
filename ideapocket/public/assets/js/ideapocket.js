$(function(){
    $('.like').click(function(ev) {
        // 自身の要素
        var button = $(this);
        
        // 親要素
        var elem = button.parents('div');
        elem = $(elem[0]);
        
        // 処理分岐
        if(elem.attr('class') === 'issue') {
            likeIssue(elem, button);
        } else if(elem.attr('class') === 'solution') {
            likeSolution(elem, button);
        }
        return false;      
    });
});

function likeIssue(elem, button) {
    // カウント領域の取得
    var counter = $('.count li', elem);
    counter = $(counter[1]);

	// Issue IDを取得
	var issue_id = 0;
	if(elem.attr('id').match(/issue([0-9]+)$/)) {
		issue_id = RegExp.$1;
	}
    
    // いいねの判定
    if(!button.attr('class').match('liked')) {
        // いいねを保存
		$.ajax({
			url: "/like/add",
			type: 'POST',
		   	data: { issue_id: issue_id },
		   	success: function(){
				// 表示置き換え
		        var html = counter.html();
		        if(html.match(/([0-9]+)$/)) {
		            var count1 = parseInt(RegExp.$1);
		            var count2 = count1 + 1;
		            counter.html(html.replace(count1, count2));
		        }

		        button.text('いいね！を取り消す');
		        button.addClass('liked');
			},
			error: function() {
				alert('いいね！の投稿に失敗しました');
			}
		});
    } else {
        // Ajax

        // 表示置き換え
        var html = counter.html();
        if(html.match(/([0-9]+)$/)) {
            var count1 = parseInt(RegExp.$1);
            var count2 = count1 - 1;
            counter.html(html.replace(count1, count2));
        }
        
        button.text('いいね！');
        button.removeClass('liked');
    }
}

function likeSolution(elem, button) {
    // カウント領域の取得
    var counter = $('.count-mini', elem);
    
    // いいねの判定
    if(!button.attr('class').match('liked')) {
        // Ajax

        // 表示置き換え
        var html = counter.html();
        if(html.match(/([0-9]+)$/)) {
            var count1 = parseInt(RegExp.$1);
            var count2 = count1 + 1;
            counter.html(html.replace(count1, count2));
        }
        
        button.text('いいね！を取り消す');
        button.addClass('liked');
    } else {
        // Ajax

        // 表示置き換え
        var html = counter.html();
        if(html.match(/([0-9]+)$/)) {
            var count1 = parseInt(RegExp.$1);
            var count2 = count1 - 1;
            counter.html(html.replace(count1, count2));
        }
        
        button.text('いいね！');
        button.removeClass('liked');
    }
}