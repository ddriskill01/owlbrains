
    $(document).ready(function() {
        $(".fancybox").fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                afterLoad   : function() {
                this.inner.prepend( '' );
                this.content = ' ' + this.content.html();
                }
        });
        $(".fancybox2").fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                afterLoad   : function() {
                this.inner.prepend( '' );
                this.content = ' ' + this.content.html();
                }
        });
    });
