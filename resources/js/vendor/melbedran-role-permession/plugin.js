/**
 * Melbedran-Role-permession — Vue plugin ($can / $canAny / $canAll / $cannot)
 */
export function createRolePermessionPlugin(options = {}) {
  const superAdminKey = options.superAdminKey ?? 'super_admin'
  let getProps = options.pageProps ?? (() => ({}))

  const readAuth = () => {
    const props = typeof getProps === 'function' ? getProps() : getProps
    return {
      user: props?.auth?.user,
      abilities: props?.auth?.abilities || [],
    }
  }

  const can = (ability) => {
    const { user, abilities } = readAuth()
    if (user?.[superAdminKey]) return true
    return abilities.includes(ability)
  }

  return {
    install(app) {
      app.config.globalProperties.$can = can
      app.config.globalProperties.$canAny = (abilities) => abilities.some((a) => can(a))
      app.config.globalProperties.$canAll = (abilities) => abilities.every((a) => can(a))
      app.config.globalProperties.$cannot = (ability) => !can(ability)
      app.config.globalProperties.$rolePermessionSetPage = (getter) => {
        getProps = getter
      }
    },
  }
}

export default createRolePermessionPlugin
