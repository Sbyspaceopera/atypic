<?php get_header(); ?>

<main class="atypic-main sm:w-1/2" >
    <div class="bg-white p-5 border-y-4 border-x-0 sm:border-4 border-black border-solid sm:rounded-lg flex flex-col">
        <div class="flex self-center">
            <img class="w-20" src="https://c.tenor.com/lx2WSGRk8bcAAAAC/pulp-fiction-john-travolta.gif">
            <h2 class="text-center text-8xl font-bold my-0 p-5">404</h2> 
            <img class="w-20 -scale-x-100" src="https://c.tenor.com/lx2WSGRk8bcAAAAC/pulp-fiction-john-travolta.gif">
        </div>
        <p class="text-center font-semibold text-gray-600">
            Cette page n'existe pas, retournez plutôt sur
            <a class="underline text-black decoration-yellow-500 decoration-2 underline-offset-2 active:decoration-yellow-500 " href="<?php site_url(); ?>"> la page d'acceuil</a> ou servez vous des menus.
        </p>
    </div>
</main>

<?php get_footer(); ?>
