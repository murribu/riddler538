<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\ScrabbleWord;

class WordsSeeder extends Seeder{
	public function run(){
        
        $filename = "storage/scrabble_words.txt";
        $words_str = File::get($filename);
        $words = explode("\n", $words_str);
        
        foreach($words as $word_str){
            $word = ScrabbleWord::where('word', $word_str)->first();
            if (!$word){
                $word = new ScrabbleWord;
                $word->word = $word_str;
                $word->save();
            }
        }
    }
}