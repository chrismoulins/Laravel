<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Template;
use App\Page;
use App\ContentArea;
use App\Article;
use App\User;
use App\Role;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded!');

		$this->call('TemplateTableSeeder');
        $this->command->info('Template table seeded!');

        $this->call('PageTableSeeder');
        $this->command->info('Page table seeded!');

        $this->call('ContentAreaTableSeeder');
        $this->command->info('Content Area table seeded!');

        $this->call('ArticleTableSeeder');
        $this->command->info('Article table seeded!');
	}
}


class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('whatever')
        ]);
    }
}

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();

        $administrator = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'User is allowed to manage user creation and priveleges.'
        ]);

        $editor = Role::create([
            'name' => 'editor',
            'display_name' => 'Editor',
            'description' => 'User is allowed to manage article,template, page, and content area settings.'
        ]);

        $author = Role::create([
            'name' => 'author',
            'display_name' => 'Author',
            'description' => 'User is allowed to edit an article on the front end.'
        ]);

        $user = App\User::find(1);
        $user->roles()->attach($administrator);
    }
}

class TemplateTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('templates')->delete();

        Template::create([
            'name' => 'Soft Colors Template' ,
            'alias' => 'soft',
            'description' => 'A template with soft colors to soothe the soul.',
            'active_state' => false,
            'css_content' => 'body{ background-color: beige;}',
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Template::create([
            'name' => 'Other Colors Template' ,
            'alias' => 'other',
            'description' => 'A template with other colors to soothe the soul.',
            'active_state' => true,
            'css_content' => 'body{ background-color: e0eeee; } #Header h1{color: #ffa500} #Footer h1{color: #450b00} #Main h1{color: #00ced1}',
            'created_by' => 1,
            'modified_by' => 1
        ]);
    }
}

class PageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->delete();

        Page::create([
            'name' => 'News Items' ,
            'alias' => 'news',
            'description' => 'News you can use.',
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Page::create([
            'name' => 'Pop Culture' ,
            'alias' => 'popCulture',
            'description' => 'Celebrities, and stuff.',
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Page::create([
            'name' => 'Food Blog' ,
            'alias' => 'food',
            'description' => 'Getting hungry yet?',
            'created_by' => 1,
            'modified_by' => 1
        ]);

    }
}

class ContentAreaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('content_areas')->delete();

        ContentArea::create([
            'name' => 'Header' ,
            'alias' => 'header',
            'description' => 'The header content area.',
            'display_order' => 1,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        ContentArea::create([
            'name' => 'Footer' ,
            'alias' => 'footer',
            'description' => 'The footer content area.',
            'display_order' => 3,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        ContentArea::create([
            'name' => 'Main' ,
            'alias' => 'main',
            'description' => 'The main content area.',
            'display_order' => 2,
            'created_by' => 1,
            'modified_by' => 1
        ]);
    }
}

class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->delete();

        Article::create([
            'title' => 'Christmas is Coming!',
            'alias' => 'christmas',
            'description' => 'Everything you need to know about Santa (not for children).',
            'all_pages' => false,
            'article_content' => '<h3>This is happening</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'article_content_area_id' => 1,
            'article_page_id' => 1,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Article::create([
            'title' => 'I was up all night',
            'alias' => 'up',
            'description' => 'Im tired.',
            'all_pages' => true,
            'article_content' => '<h3>This is happening</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'article_content_area_id' => 1,
            'article_page_id' => 2,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Article::create([
            'title' => 'Articles are fun',
            'alias' => 'articles',
            'description' => 'I love articles',
            'all_pages' => false,
            'article_content' => '<h3>This is happening</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'article_content_area_id' => 2,
            'article_page_id' => 3,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Article::create([
            'title' => 'Im never writing an article again' ,
            'alias' => 'bad',
            'description' => 'I hate articles',
            'all_pages' => false,
            'article_content' => '<h3>This is happening</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'article_content_area_id' => 3,
            'article_page_id' => 1,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Article::create([
            'title' => 'Everyone hates the Cold!' ,
            'alias' => 'weather',
            'description' => 'Bundling up made easy!',
             'all_pages' => false,
            'article_content' => '<h3>This is happening</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It </p>',
            'article_content_area_id' => 2,
            'article_page_id' => 2,
            'created_by' => 1,
            'modified_by' => 1
        ]);

        Article::create([
            'title' => 'Holy #$%@, this is a CMS' ,
            'alias' => 'cms',
            'description' => 'Made by Chris and Eva.',
            'all_pages' => false,
            'article_content' => '<h3>This is happening</h3><p>This is really happening. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It </p>',
            'article_content_area_id' => 1,
            'article_page_id' => 3,
            'created_by' => 1,
            'modified_by' => 1
        ]);
    }
}
