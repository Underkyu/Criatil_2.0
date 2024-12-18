@file:OptIn(ExperimentalMaterial3Api::class, ExperimentalMaterial3Api::class,
    ExperimentalMaterial3Api::class
)

package com.example.appcriatil.components

import android.util.Log
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.border
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.heightIn
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.layout.widthIn
import androidx.compose.foundation.layout.wrapContentSize
import androidx.compose.foundation.lazy.LazyRow
import androidx.compose.foundation.lazy.itemsIndexed
import androidx.compose.foundation.lazy.rememberLazyListState
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.foundation.text.ClickableText
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.ArrowBack
import androidx.compose.material.icons.filled.ArrowForward
import androidx.compose.material.icons.filled.Visibility
import androidx.compose.material.icons.filled.VisibilityOff
import androidx.compose.material3.Button
import androidx.compose.material3.ButtonDefaults
import androidx.compose.material3.Checkbox
import androidx.compose.material3.CheckboxDefaults
import androidx.compose.material3.Divider
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.draw.shadow
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.graphics.painter.Painter
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.text.SpanStyle
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.buildAnnotatedString
import androidx.compose.ui.text.font.FontStyle
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.input.KeyboardType
import androidx.compose.ui.text.input.PasswordVisualTransformation
import androidx.compose.ui.text.input.VisualTransformation
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.text.withStyle
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.appcriatil.R
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.ui.theme.TextColor
import kotlinx.coroutines.delay

@Composable
fun ElementoTextoBasico(value:String){
    Text(
        text = value,
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(min = 40.dp),
        style = TextStyle(
            fontSize = 24.sp,
            fontWeight = FontWeight.Normal,
            fontStyle = FontStyle.Normal
        )
        , color = TextColor,
          textAlign = TextAlign.Center
    )
}

@Composable
fun ElementoTextoTitulo(value:String){
    Text(
        text = value,
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(),
        style = TextStyle(
            fontSize = 30.sp,
            fontWeight = FontWeight.Bold,
            fontStyle = FontStyle.Normal
        )
        , color = TextColor,
        textAlign = TextAlign.Center
    )
}

@Composable
fun ElementoTextField(labelValue: String, painterResource: Painter){

    val textValue = remember {
        mutableStateOf("")
    }

    OutlinedTextField(
        modifier = Modifier
            .fillMaxWidth()
            .background(Color.White)
            .padding(horizontal = 8.dp, vertical = 8.dp),
        textStyle = TextStyle(
            color = Color.Black,
            fontSize = 16.sp
        ),
        label = { Text(text = labelValue) },
        keyboardOptions = KeyboardOptions.Default,
        value = textValue.value,
        onValueChange = {
            textValue.value = it
        },
        leadingIcon = {
            Icon(painter = painterResource, contentDescription = "")
        }
    )
}

@Composable
fun ElementoSenhaTextField(labelValue: String, painterResource: Painter){

    val senha = remember {
        mutableStateOf("")
    }

    val senhaVisivel = remember {
        mutableStateOf(false)
    }

    OutlinedTextField(
        modifier = Modifier
            .fillMaxWidth()
            .background(Color.White)
            .padding(horizontal = 8.dp, vertical = 8.dp),
        textStyle = TextStyle(
            color = Color.Black,
            fontSize = 16.sp
        ),
        label = { Text(text = labelValue) },
        keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Password),
        value = senha.value,
        onValueChange = {
            senha.value = it
        },
        leadingIcon = {
            Icon(painter = painterResource, contentDescription = "")
        },
        trailingIcon = {
            val iconImage = if (senhaVisivel.value) {
                Icons.Filled.Visibility
            } else {
                Icons.Filled.VisibilityOff
            }

            val description = if(senhaVisivel.value){
                stringResource(id = R.string.esconderSenha)
            }else{
                stringResource(id = R.string.mostrarSenha)
            }

            IconButton(onClick = { senhaVisivel.value = !senhaVisivel.value }) {
                Icon(imageVector = iconImage, contentDescription = description)
            }
        },
        visualTransformation = if (senhaVisivel.value) VisualTransformation.None else PasswordVisualTransformation()
    )
}

@Composable
fun ElementoCheckbox(value: String, onTextSelected: (String) -> Unit) {
    val checkedState = remember { mutableStateOf(false) }

    Row(
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(56.dp),
        verticalAlignment = Alignment.CenterVertically
    ) {
        Checkbox(
            colors = CheckboxDefaults.colors(
                checkedColor = Color(0xFF0476D9)
            ),
            checked = checkedState.value,
            onCheckedChange = { newValue ->
                checkedState.value = newValue
            }
        )

        ElementoTextoClicavel(value = value, onTextSelected)
    }
}

@Composable
fun ElementoTextoClicavel(value: String , onTextSelected: (String) -> Unit){
    val textoInicial = "Assinalar significa que você concorda com as "
    val politicaPrivacidade = "políticas de privacidade"
    val e = " e "
    val termosDeUso = "termos de uso"

    val annotatedString = buildAnnotatedString {
        append(textoInicial)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = politicaPrivacidade, annotation = politicaPrivacidade)
            append(politicaPrivacidade)
        }
        append(e)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = termosDeUso, annotation = termosDeUso)
            append(termosDeUso)
        }
    }

    ClickableText(text = annotatedString , onClick ={ offset ->
        annotatedString.getStringAnnotations(offset, offset)
            .firstOrNull()?.also { span ->
                Log.d("ElementoTextoClicavel", "{${span.item}}")

                if((span.item == politicaPrivacidade) || (span.item == termosDeUso)){
                    onTextSelected(span.item)
                }
            }

    })
}

@Composable
fun ElementoBotao(value: String, onClick: () -> Unit){
    Button(onClick = { /*TODO*/},
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(48.dp),
        contentPadding = PaddingValues(),
        colors = ButtonDefaults.buttonColors(Color.Transparent)
        ) {
            Box(modifier = Modifier
                .fillMaxWidth()
                .heightIn(48.dp)
                .background(
                    Brush.horizontalGradient(colors = listOf(Color(0xFFF2AF00), Color(0xFFF2AF00))),
                    shape = RoundedCornerShape(50.dp)
                ),
                contentAlignment = Alignment.Center
            ){
                Text(text = value,
                    fontSize = 24.sp,
                    fontWeight = FontWeight.Bold)
            }
    }
}

@Composable
fun ElementoDivisorComTexto(){
    Row(
        modifier = Modifier.fillMaxWidth(),
        verticalAlignment = Alignment.CenterVertically
    ) {
        Divider(
            modifier = Modifier
                .fillMaxWidth()
                .weight(1f),
            color = Color.LightGray,
            thickness = 1.dp
        )

        Text(
            text = "ou",
            fontSize = 18.sp,
            color = Color.LightGray,
            modifier = Modifier.padding(horizontal = 8.dp)
        )

        Divider(
            modifier = Modifier
                .fillMaxWidth()
                .weight(1f),
            color = Color.LightGray,
            thickness = 1.dp
        )
    }
}

@Composable
fun ElementoTextoLoginClicavel(value: String , onTextSelected: (String) -> Unit){
    val textoInicial = "Já tem uma conta? "
    val login = "Faça login"

    val annotatedString = buildAnnotatedString {
        append(textoInicial)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = login, annotation = login)
            append(login)
        }
    }

    ClickableText(modifier = Modifier
        .fillMaxWidth()
        .heightIn(min = 40.dp),
        style = TextStyle(
            fontSize = 18.sp,
            fontWeight = FontWeight.Normal,
            fontStyle = FontStyle.Normal,
            textAlign = TextAlign.Center
        ),
        text = annotatedString, onClick ={ offset ->
        annotatedString.getStringAnnotations(offset, offset)
            .firstOrNull()?.also { span ->
                Log.d("ElementoTextoLoginClicavel", "{${span.item}}")

                if(span.item == login){
                    onTextSelected(span.item)
                }
            }

    })
}

@Composable
fun ElementoTextoCadastroClicavel(value: String , onTextSelected: (String) -> Unit){
    val textoInicial = "Não possui uma conta? "
    val cadastro = "Faça cadastro"

    val annotatedString = buildAnnotatedString {
        append(textoInicial)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = cadastro, annotation = cadastro)
            append(cadastro)
        }
    }

    ClickableText(modifier = Modifier
        .fillMaxWidth()
        .heightIn(min = 40.dp),
        style = TextStyle(
            fontSize = 18.sp,
            fontWeight = FontWeight.Normal,
            fontStyle = FontStyle.Normal,
            textAlign = TextAlign.Center
        ),
        text = annotatedString, onClick ={ offset ->
            annotatedString.getStringAnnotations(offset, offset)
                .firstOrNull()?.also { span ->
                    Log.d("ElementoTextoCadastroClicavel", "{${span.item}}")

                    if(span.item == cadastro){
                        onTextSelected(span.item)
                    }
                }

        })
}

@Composable
fun ElementoHeaderNav(value: String, onClick: () -> Unit) {
    Row(
        modifier = Modifier
            .background(Color(0xFF0476D9))
            .fillMaxWidth()
            .heightIn(min = 64.dp),
        verticalAlignment = Alignment.CenterVertically,
        horizontalArrangement = Arrangement.SpaceBetween
    ) {
        Button(
            onClick = onClick,
            modifier = Modifier
                .heightIn(64.dp)
                .wrapContentSize(), // Wrap the entire button content
            contentPadding = PaddingValues(),
            colors = ButtonDefaults.buttonColors(Color.Transparent)
        ) {
            Box(
                modifier = Modifier
                    .heightIn(64.dp)
                    .wrapContentSize() // Wrap the Box content
                    .background(
                        color = Color.Transparent,
                        shape = RoundedCornerShape(50.dp)
                    ),
                contentAlignment = Alignment.Center
            ) {
                Row(verticalAlignment = Alignment.CenterVertically) {
                    Icon(
                        imageVector = Icons.Filled.ArrowBack,
                        contentDescription = "Arrow",
                        tint = Color.White
                    )
                    Text(
                        text = value,
                        fontSize = 24.sp,
                        fontWeight = FontWeight.Bold
                    )
                }
            }
        }
        Image(
            painter = painterResource(id = R.drawable.logobranca),
            contentDescription = "Image",
            modifier = Modifier
                .heightIn(64.dp)
                .widthIn(128.dp)
        )
    }
}

@Composable
fun ElementoIconeFooter(text: String, painterResource: Painter, onClick: () -> Unit) {
    Column(
        horizontalAlignment = Alignment.CenterHorizontally,
        modifier = Modifier.clickable { onClick() }
    ) {
        Icon(
            painter = painterResource,
            contentDescription = text,
            tint = Color.White,
            modifier = Modifier.size(48.dp)
        )
        Spacer(modifier = Modifier.height(4.dp))
        Text(text = text, fontSize = 14.sp, color = Color.White, fontWeight = FontWeight.Bold)
    }
}

@Composable
fun ElementoFooter(modifier: Modifier = Modifier) {
    Row(
        modifier = modifier
            .fillMaxWidth()
            .heightIn(min = 48.dp)
            .background(Color(0xFF0476D9))
            .padding(16.dp),
        horizontalArrangement = Arrangement.SpaceAround,
        verticalAlignment = Alignment.CenterVertically
    ) {
        ElementoIconeFooter(
            text = "Home",
            painterResource = painterResource(id = R.drawable.homeicon),
            onClick = { CriatilAppRouter.navigateTo(Screen.Home) }
        )
        ElementoIconeFooter(
            text = "Carrinho",
            painterResource = painterResource(id = R.drawable.carrinho),
            onClick = { /* TODO */ }
        )
        ElementoIconeFooter(
            text = "Perfil",
            painterResource = painterResource(id = R.drawable.icon_profile),
            onClick = { CriatilAppRouter.navigateTo(Screen.TelaPerfil) }
        )
    }
}

@Composable
fun PaddedItem(content: @Composable () -> Unit) {
    Box(modifier = Modifier.padding(horizontal = 16.dp)) {
        content()
    }
}

@Composable
fun ElementoHomeHeader() {
    val textValue = remember {
        mutableStateOf("")
    }
    Column(modifier = Modifier
        .background(Color(0xFF0476D9))
        .fillMaxWidth()
    ) {
        Row(
            modifier = Modifier
                .fillMaxWidth()
                .heightIn(min = 64.dp),
            horizontalArrangement = Arrangement.SpaceBetween
        ) {
            val onClick = { /*TODO*/ }
            Column(
                horizontalAlignment = Alignment.CenterHorizontally,
                modifier = Modifier
                    .padding(16.dp)
                    .clickable { onClick() }
            ) {
                Icon(
                    painter = painterResource(id = R.drawable.menu),
                    contentDescription = "Menu",
                    tint = Color.White,
                    modifier = Modifier.size(36.dp)
                )
            }
            Image(
                painter = painterResource(id = R.drawable.logobranca),
                contentDescription = "Image",
                modifier = Modifier
                    .heightIn(64.dp)
                    .widthIn(128.dp)
            )
            Spacer(modifier = Modifier
                .size(36.dp)
                .padding(16.dp))
        }
        Row(
            modifier = Modifier
                .fillMaxWidth(),
            horizontalArrangement = Arrangement.Center
        ) {
            OutlinedTextField(
                value = textValue.value,
                onValueChange = { textValue.value = it },
                label = {
                    Text(
                        text = stringResource(id = R.string.encontreBrinquedo),
                        style = TextStyle(
                            fontSize = 16.sp,
                            fontWeight = FontWeight.Normal,
                            fontStyle = FontStyle.Normal
                        )
                    )
                },
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(16.dp)
                    .clip(RoundedCornerShape(25.dp))
                    .background(Color.White)
                    .height(50.dp)
                    .padding(bottom = 8.dp),
            textStyle = TextStyle(
                color = Color.Black,
                fontSize = 16.sp
            ),
                trailingIcon = {
                    Icon(
                        painter = painterResource(id = R.drawable.search),
                        contentDescription = "Search",
                        modifier = Modifier.size(24.dp)
                    )
                }
            )
        }
    }
}

@Composable
fun ElementoImageCarousel(images: List<Int>) {
    val lazyListState = rememberLazyListState()

    LazyRow(
        state = lazyListState,
        modifier = Modifier
            .fillMaxWidth()
            .padding(horizontal = 32.dp)
    ) {
        items(images.size * 3) { index ->
            val imageIndex = index % images.size
            Image(
                painter = painterResource(id = images[imageIndex]),
                contentDescription = "Carrossel de imagem",
                modifier = Modifier
                    .size(310.dp)
                    .padding(16.dp)
                    .shadow(elevation = 10.dp, shape = RoundedCornerShape(10.dp))
                    .clip(RoundedCornerShape(10.dp))
            )
        }
    }

    LaunchedEffect(Unit) {
        while (true) {
            delay(6000) // Delay
            lazyListState.animateScrollToItem(lazyListState.firstVisibleItemIndex + 1)
            if (lazyListState.firstVisibleItemIndex == images.size * 1) {

                lazyListState.scrollToItem(images.size, 0)
            }
        }
    }
}

data class IconData(val iconResId: Int, val label: String)

@Composable
fun ElementoIconCarousel(iconDataList: List<IconData>, modifier: Modifier = Modifier) {
    val itemsPerPage = 3
    val totalPages = (iconDataList.size + itemsPerPage - 1) / itemsPerPage
    var currentPage by remember { mutableStateOf(0) }
    val iconsize = 90.dp
    val lazyListState = rememberLazyListState()

    Box(modifier = modifier) {
        LazyRow(
            state = lazyListState,
            modifier = Modifier
                .fillMaxWidth()
                .height(iconsize),
            horizontalArrangement = Arrangement.SpaceAround,
            contentPadding = PaddingValues(horizontal = 40.dp)
        ) {
            itemsIndexed(iconDataList.subList(currentPage * itemsPerPage, minOf((currentPage + 1) * itemsPerPage, iconDataList.size))) { index, iconData ->
                Icon(
                    painter = painterResource(id = iconData.iconResId),
                    contentDescription = iconData.label,
                    tint = Color.Unspecified,
                    modifier = Modifier
                        .size(iconsize)
                        .clip(CircleShape)
                        .padding(8.dp)
                        .border(3.dp, Color(0xFFF2AF00), CircleShape)
                )
            }
        }

        Row(
            modifier = Modifier
                .fillMaxWidth()
                .align(Alignment.Center),
            horizontalArrangement = Arrangement.SpaceBetween
        ) {
            IconButton(onClick = { currentPage = maxOf(0, currentPage - 1) }, enabled = currentPage > 0) {
                Icon(Icons.Filled.ArrowBack, contentDescription = "Voltar")
            }
            IconButton(onClick = { currentPage = minOf(totalPages - 1, currentPage + 1) }, enabled = currentPage < totalPages - 1) {
                Icon(Icons.Filled.ArrowForward, contentDescription = "Próximo")
            }
        }
    }
}

@Composable
fun ElementoCardProduto(texto: String, preco: String,painterResource: Painter, onClick: () -> Unit) {
    Column(
        horizontalAlignment = Alignment.CenterHorizontally,
        modifier = Modifier
            .clickable { onClick() }
            .padding(8.dp)
            .width(170.dp)
            .border(1.dp, Color.LightGray, RoundedCornerShape(8.dp))
            .shadow(elevation = 8.dp, shape = RoundedCornerShape(8.dp))
            .background(color = Color.White)
    ) {
        Image(
            painter = painterResource,
            contentDescription = texto,
            modifier = Modifier
                .fillMaxWidth()
                .height(170.dp)
                .padding(8.dp)
                .clip(RoundedCornerShape(8.dp))
            )
        Spacer(modifier = Modifier.height(4.dp))
        Text(text = texto, fontSize = 14.sp, color = Color.Black, fontWeight = FontWeight.Bold, modifier = Modifier.padding(4.dp))
        Text(text = stringResource(R.string.porapenas), fontSize = 14.sp, color = Color.Black, modifier = Modifier.padding(4.dp))
        Text(text = preco, fontSize = 24.sp, color = Color(0xFFF2AF00), fontWeight = FontWeight.Bold, modifier = Modifier.padding(4.dp))
    }
}

@Composable
fun ElementoTextoDisplay(label: String, value: String){
    Row(
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(min = 40.dp),
        horizontalArrangement = Arrangement.SpaceBetween,
        verticalAlignment = Alignment.CenterVertically
    ) {
        Text(
            text = label,
            fontSize = 16.sp,
            fontWeight = FontWeight.Bold,
            color = Color.Black
            )
        Text(
            text = value,
            fontSize = 16.sp,
            fontWeight = FontWeight.Bold,
            color = Color.Black
        )
    }
}

@Preview(showBackground = true, showSystemUi = true)
@Composable
fun ElementoPreview(){
    Column () {
        Spacer(modifier = Modifier.height(45.dp))
        ElementoCardProduto("Pelúcia Ralsei Deltarune", "R$ 100,00",painterResource(id = R.drawable.ralseideltarune), onClick = ({

        }))
    }
}

