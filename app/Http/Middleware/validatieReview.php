<?php
//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Support\Facades\Auth;
//
//class vadivideReview
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @return mixed
//     */
//    public function handle($request, Closure $next)
//    {
//        // Controleer of de gebruiker ingelogd is
//        if (!Auth::check()) {
//            return redirect()->route('login')->withErrors('Je moet ingelogd zijn om een huis te plaatsen.');
//        }
//
//        // Haal de ingelogde gebruiker op
//        $user = Auth::user();
//
//        // Voer een query uit om te controleren of de gebruiker minstens één review heeft
//        $hasReview = $user->reviews()->exists();
//
//        // Als de gebruiker geen review heeft, blokkeer dan de actie
//        if (!$hasReview) {
//            return redirect()->back()->withErrors('Je moet minstens één review hebben geplaatst om een huis te kunnen toevoegen.');
//        }
//
//        return $next($request);
//    }
//}
