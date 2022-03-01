<template>
    <div class="box d-flex justify-content-start align-items-end">            
        <div class="text">
            <!--type.name-->
            Tipologia
        </div>    
    </div>
</template>

<script>
export default {
    name : 'TypeBox'
}
</script>

<style lang="scss" scoped>

    .box{
        height: 100px;
        width: 150px;
        border-radius: 20px;
        background-color: orange;
        box-shadow: 0 1px 2px rgba(0,0,0,0.15);
        transition: box-shadow 0.3s ease-in-out;
        margin-right: 10px;
        transition: height 0.3s, width 0.3s;

    }

    .box:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        height: 110px;
        width: 160px;
        font-weight: bold;
    }

    .text{
        padding: 0 10px;
    }

</style>