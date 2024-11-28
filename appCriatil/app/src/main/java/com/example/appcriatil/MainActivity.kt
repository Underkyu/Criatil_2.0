package com.example.appcriatil

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.activity.viewModels
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.core.splashscreen.SplashScreen.Companion.installSplashScreen
import androidx.lifecycle.ViewModel
import androidx.lifecycle.ViewModelProvider
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import androidx.room.Room
import com.example.appcriatil.RoomDB.CriatilDataBase
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.screens.Home
import com.example.appcriatil.screens.TelaCadastro
import com.example.appcriatil.screens.TelaDeLogin
import com.example.appcriatil.screens.TelaDeTermosECondicoes
import com.example.appcriatil.screens.TelaPerfil
import com.example.appcriatil.ui.theme.AppCriatilTheme
import com.example.appcriatil.viewModel.CriatilViewModel
import com.example.appcriatil.viewModel.Repository

class MainActivity : ComponentActivity() {
    private val db by lazy {
        Room.databaseBuilder(
            applicationContext,
            CriatilDataBase::class.java,
            "criatil.db"
        ).build()
    }

    private val CriatilViewModel by viewModels<CriatilViewModel>(
        factoryProducer = {
            object : ViewModelProvider.Factory {
                override fun <T : ViewModel> create(modelClass: Class<T>): T {
                    return CriatilViewModel(Repository(db)) as T
                }
            }
        }
    )

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        installSplashScreen()
        enableEdgeToEdge()
        setContent {
            val navController = rememberNavController()
            NavHost(navController = navController, startDestination = CriatilAppRouter.home, builder = {
                composable(CriatilAppRouter.home){
                    Home(navController)
                }
                composable(CriatilAppRouter.cadastro){
                    TelaCadastro(navController, CriatilViewModel, mainActivity = this@MainActivity)
                }
                composable(CriatilAppRouter.login){
                    TelaDeLogin(navController, CriatilViewModel, mainActivity = this@MainActivity)
                }
                composable(CriatilAppRouter.perfil){
                    TelaPerfil(navController, CriatilViewModel, mainActivity = this@MainActivity)
                }
                composable(CriatilAppRouter.termos){
                    TelaDeTermosECondicoes(navController, mainActivity = this@MainActivity)
                }
            })
        }
    }
}