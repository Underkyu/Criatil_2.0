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
import androidx.lifecycle.ViewModel
import androidx.lifecycle.ViewModelProvider
import androidx.room.Room
import com.example.appcriatil.RoomDB.CriatilDataBase
import com.example.appcriatil.app.CriatilApp
import com.example.appcriatil.ui.theme.AppCriatilTheme
import com.example.appcriatil.viewModel.CriatilViewModel
import com.example.appcriatil.viewModel.Repository

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            CriatilApp()
        }
    }

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
}