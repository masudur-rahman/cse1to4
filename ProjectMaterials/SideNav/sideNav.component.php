<div id="sideNav">
    <ul id="nameContainer">
        <li class="teacherNames activeName" id='all'>All</li>
        <li class="teacherNames" id = 'teacher2'>Dr. Mohammed Moshiul Hoque</li>
        <li class="teacherNames" id = 'teacher2'>Dr. Kaushik Deb</li>
        <li class="teacherNames" id = 'teacher3'>Dr. Md. Ibrahim Khan</li>
</div>

<script type="text/javascript">

    //FOR SELECTED NAME DO THE FOLLOWING

    $(function() {
        $('li').click(function() {
            $(this).siblings('li').removeClass('activeName');
            $(this).addClass('activeName');
        });
    });
</script>