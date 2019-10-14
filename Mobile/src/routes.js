import { createAppContainer, createSwitchNavigator } from "react-navigation";

import Babel from "./pages/Babel";

const Routes = createAppContainer(createSwitchNavigator({ Babel }));

export default Routes;