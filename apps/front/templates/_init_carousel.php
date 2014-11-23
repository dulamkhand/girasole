<script type="text/javascript">
//<![CDATA[
$.win = $(window);
$.doc = $(document);
$(function() {
	$.doc
		.find('.carousel')
			.eq(0)
				.carousel({'loop': false, 'interval':10})
			.end()
			.eq(1)
				.carousel({'zones': [[0, 50, 5], [50, 100, 5]]})
			.end()
			.eq(2)
				.carousel({'loop': false})
			.end()
			.eq(3)
				.carousel({'loop': false});
});
//]]>
</script>